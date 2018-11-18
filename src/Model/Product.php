<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function Brand(){
        return $this->belongsTo(Brand::class, 'brand');
    }

    public function Category(){
        return $this->belongsTo(Category::class, 'category');
    }

    public function Images(){
        return $this->hasMany(ProductImage::class, 'product');
    }

    public function Wishlists(){
        return $this->belongsToMany(Wishlist::class, 'wishlist_products','product','wishlist')->wherePivot('status','Active')->wherePivot('product_status','Active')->withTimestamps();
    }
}
