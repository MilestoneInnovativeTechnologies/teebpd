<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';

    protected $dispatchesEvents = [
        'created' => \Milestone\Teebpd\Event\WishlistCreated::class
    ];

    public function Author(){
        return $this->belongsTo(Visitor::class,'author')->withDefault(['name' => 'Vendor', 'email' => 'no-replay@example.com', 'number' => '971']);
    }

    public function Vendor(){
        return $this->hasOne(VendorWishlist::class,'wishlist');
    }

    public function Visitors(){
        return $this->belongsToMany(Visitor::class,'visitor_wishlists', 'wishlist','visitor')->withPivot(['viewed','status'])->withTimestamps();
    }

    public function Notes(){
        return $this->hasMany(WishlistNote::class,'wishlist')->where('status','Active')->with(['Author']);
    }

    public function Items(){
        return $this->hasMany(WishlistProduct::class,'wishlist')->where('status','Active')->with(['Product']);
    }

    public function Products(){
        return $this->belongsToMany(Product::class,'wishlist_products', 'wishlist','product')->wherePivot('status','Active')->wherePivot('product_status','Active');
    }

    public function scopeVendorShare($Q){
        return $Q->whereHas('Vendor',function($Q){ $Q->where('status','Active'); });
    }
}
