<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class WishlistProduct extends Model
{
    protected $table = 'wishlist_products';

    protected $dispatchesEvents = [
        'created' => \Milestone\Teebpd\Event\WishlistProductAdded::class,
    ];

    public function Wishlist(){
        return $this->belongsTo(Wishlist::class,'wishlist');
    }

    public function Added(){
        return $this->belongsTo(Visitor::class,'added_by');
    }

    public function Removed(){
        return $this->belongsTo(Visitor::class,'removed_by');
    }

    public function Notes(){
        return $this->hasMany(WishlistProductNote::class,'wishlist_product')->where('status','Active')->with(['Author']);
    }

    public function Product(){
        return $this->belongsTo(Product::class,'product');
    }
}
