<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function Brand(){
        return $this->belongsTo(ItemGroupMaster::class, 'category_02');
    }

    public function Category(){
        return $this->belongsTo(ItemGroupMaster::class, 'category_01');
    }

    public function Size(){
        return $this->belongsTo(ItemGroupMaster::class, 'category_04');
    }

    public function Color(){
        return $this->belongsTo(ItemGroupMaster::class, 'category_03');
    }

    public function Images(){
        return $this->hasMany(ProductImage::class, 'product')->where('status','Active');
    }

    public function Wishlists(){
        return $this->belongsToMany(Wishlist::class, 'wishlist_products','product','wishlist')->wherePivot('status','Active')->wherePivot('product_status','Active')->withTimestamps();
    }
}
