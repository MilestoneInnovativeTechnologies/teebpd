<?php

namespace Milestone\Teebpd\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Milestone\Teebpd\Model\Visitor;
use Milestone\Teebpd\Model\Wishlist;
use Milestone\Teebpd\Model\WishlistNote;
use Milestone\Teebpd\Model\VendorWishlist;
use Milestone\Teebpd\Model\WishlistProduct;

class WishListController extends Controller
{
    public function page(){
        $vid = Cookie::get('__teeb_visitor');
        $visitor = ($vid) ? Visitor::find($vid) : null;
        return view('wishlist')->with(compact('visitor'));
    }
    public function store(Request $request){
        if($request->get('create-wishlist') === 'Add WishList'){
            $visitor = (new VisitorController)->getCurrentVisitor();
            if(!$visitor){ session()->flash('error','No visitor defined to create a wish list'); return back(); }
            $visitor->Wishlists()->save((new Wishlist)->forceFill($request->only(['name','description'])))->Vendor()->save(new VendorWishlist);
            session()->flash('info','Wish List created successfully.'); return back();
        }
        return back();
    }
    public function product(Request $request){
        if($request->wishlist == ""){ session()->flash('error','No wish list selected or created'); return back(); }
        $visitor = (new VisitorController)->getCurrentVisitor();
        if(!$visitor){ session()->flash('error','No visitor defined to create a wish list'); return back(); }
        $wishlist_id = ($request->wishlist == "-1") ? $visitor->Wishlists()->save((new Wishlist)->forceFill($request->only(['name','description'])))->Vendor()->save(new VendorWishlist)->wishlist : $request->wishlist;
        $wishlist = WishList::find($wishlist_id);
        if($request->product) $wishlist->Items()->save((new WishlistProduct)->forceFill(['product' => $request->product, 'added_by' => $visitor->id, 'added_on' => date('Y-m-d H:i:s')]));
        session()->flash('info','Product added to Wish List.');
        return back();
    }
    public function detail(Wishlist $id){
        $visitor = (new VisitorController)->getCurrentVisitor(); if(!$visitor) return redirect()->route('home');//'Wishlist cannot be displayed';
        $Author = $id->author == $visitor->id;
        if(!$Author && !$id->Visitors->where(['id' => $visitor->id, 'status' => 'Active'])->count()) return 'Wishlist cannot be displayed';
        $WishList = $id->load(['Notes.Author','Author','Visitors','Vendor','Items' => function($Q){ $Q->with(['Product' => function($Q){ $Q->with(['Brand','Category','Images']); },'Notes.Author','Added','Removed']); }]);
        return view('wishlist_details',compact('WishList','Author','visitor'));
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
        $visitor = (new VisitorController)->AddOrGetVisitor($request->email,$request->name);
        //$visitor->SharedWishlist()->save((new \App\VisitorWishList)->forceFill(['wishList_id' => $wishlist->id]));
        $visitor->SharedWishlist()->attach($wishlist->id);
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
}
