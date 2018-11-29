<?php

namespace Milestone\Teebpd\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Milestone\Teebpd\Model\Visitor;
use Milestone\Teebpd\Model\Wishlist;
use Milestone\Teebpd\Model\WishlistNote;
use Milestone\Teebpd\Model\WishlistProduct;
use Milestone\Teebpd\Mail\ShareWishlist;

class WishListController extends Controller
{
    public function page(){
        $vid = Cookie::get('__teeb_visitor');
        $visitor = ($vid) ? Visitor::find($vid) : null;
        return view('teebpd::wishlist')->with(compact('visitor'));
    }
    public function store(Request $request){
        if($request->get('create-wishlist') === 'Add WishList'){
            $visitor = (new VisitorController)->getCurrentVisitor();
            if(!$visitor){ session()->flash('error','No visitor defined to create a wish list'); return back(); }
            $visitor->Wishlists()->save((new Wishlist)->forceFill($request->only(['name','description'])));
            session()->flash('info','Wish List created successfully.'); return back();
        }
        return back();
    }
    public function product(Request $request){
        if($request->wishlist == ""){ session()->flash('error','No wish list selected or created'); return back(); }
        $visitor = (new VisitorController)->getCurrentVisitor();
        if(!$visitor){ session()->flash('error','No visitor defined to create a wish list'); return back(); }
        $wishlist_id = ($request->wishlist == "-1") ? $visitor->Wishlists()->save((new Wishlist)->forceFill($request->only(['name','description'])))->id : $request->wishlist;
        $wishlist = WishList::find($wishlist_id);
        if($request->product && !$wishlist->Items->where('product',$request->product)->count()) $wishlist->Items()->save((new WishlistProduct)->forceFill(['product' => $request->product, 'added_by' => $visitor->id, 'added_on' => date('Y-m-d H:i:s')]));
        session()->flash('info','Product added to Wish List.');
        return back();
    }
    public function detail($id){
        $visitor = (new VisitorController)->getCurrentVisitor(); if(!$visitor) return redirect()->route('home');//'Wishlist cannot be displayed';
        $WishList = Wishlist::find($id);
        $Author = $WishList->author == $visitor->id;
        if(!$Author && !$WishList->Visitors->filter(function($item)use($visitor){return ($item->id == $visitor->id && $item->pivot->status == 'Active'); })->count()) return 'Wishlist cannot be displayed';
        $WishList = $WishList->load(['Notes.Author','Author','Visitors','Vendor','Items' => function($Q){ $Q->with(['Product' => function($Q){ $Q->with(['Brand','Category','Images']); },'Notes.Author','Added','Removed']); }]);
        return view('teebpd::wishlist_details',compact('WishList','Author','visitor'));
    }
    public function delete($id){
        $visitor = (new VisitorController)->getCurrentVisitor(); if(!$visitor) return redirect()->route('home');//'Wishlist cannot be displayed';
        $WishList = Wishlist::find($id);
        if($WishList->author != $visitor->id) return back();
        $WishList->status = 'Inactive'; $WishList->save();
        return back();
    }
    public function note(Request $request){
        if(trim($request->note) === "") return back();
        $visitor = (new VisitorController)->getCurrentVisitor(); if(!$visitor) return back();
        $wishlist = $request->wishlist ? Wishlist::find($request->wishlist) : null;
        if(!$wishlist || ($wishlist->author != $visitor->id && !$wishlist->Visitors->where('id',$visitor->id)->count())) return back();
        $wishlist->Notes()->save((new WishlistNote)->forceFill(['note' => trim($request->note), 'author' => $visitor->id]));
        return back();
    }
    public function share(Request $request){
        if($request->name == "" || $request->email == "") return back();
        $visitor = (new VisitorController)->getCurrentVisitor(); if(!$visitor) return back();
        $wishlist = $request->wishlist ? Wishlist::find($request->wishlist) : null;
        if(!$wishlist || ($wishlist->author != $visitor->id && !$wishlist->Visitors->where('id',$visitor->id)->count())) return back();
        $share = (new VisitorController)->AddOrGetVisitor($request->email,$request->name);
        $share->SharedWishlist()->attach($wishlist->id);
        $this->email($wishlist,$visitor,$share);
        return back();
    }
    public function alter(Request $request){
        if(!$request->wishlist || !$request->user || !$request->status) return 0;
        $WL = Wishlist::find($request->wishlist); if(!$WL) return -1;
        $val = ['true' => 'Active', 'false' => 'Inactive'];
        if($request->user === 'vendor'){
            $WL->Vendor->status = $val[$request->status]; $WL->push();
        } else {
            $WL->Visitors()->updateExistingPivot($request->user,['status' => $val[$request->status]]);
        }
        return 1;
    }
    public function edit(Request $request){
        if(!$request->wishlist || !$request->product || !$request->from || !$WL = Wishlist::find($request->wishlist)) return 0;
        $to = ['Inactive' => 'Active', 'Active' => 'Inactive'];
        $WLP = $WL->Items()->where(['product' => $request->product, 'product_status' => $request->from])->first();
        if($request->from === 'Active'){
            $visitor = (new VisitorController)->getCurrentVisitor(); if(!$visitor) return back();
            $WLP->removed_by = $visitor->id;
            $WLP->removed_on = date('Y-m-d H:i:s');
        }
        $WLP->product_status = $to[$request->from];
        $WLP->save();
        return back();
    }
    public function email($wishlist,$sharer,$sharee){
        if(!$sharee->email) return;
        $array = ['wishlist' => $wishlist->id, 'visitor' => $sharee->id];
        $sharecode = base64_encode(json_encode($array));
        Mail::to($sharee->email)->queue(new ShareWishlist($sharer,$sharee,$sharecode));
    }
    public function in($code){
        $array = json_decode(base64_decode($code),true);
        $wishlist = $array['wishlist']; $visitor = $array['visitor'];
        if(!$visitor || !$visitor = Visitor::find($visitor)) return route('home');
        return redirect()->route('wishlist.detail',$wishlist)->cookie('__teeb_visitor',$visitor->id,30*24*60,'/');
    }
}
