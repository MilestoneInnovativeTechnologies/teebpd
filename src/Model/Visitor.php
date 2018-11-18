<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';

    public function Wishlists(){
        return $this->hasMany(Wishlist::class,'author')->where('status','Active');
    }

    public function SharedWishlist(){
        return $this->belongsToMany(Wishlist::class,'visitor_wishlists','visitor','wishlist')->wherePivot('status','Active')->with(['viewed'])->withTimestamps();
    }
}
