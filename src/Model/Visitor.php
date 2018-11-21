<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';

    protected $dispatchesEvents = [
        'created' => \Milestone\Teebpd\Event\VisitorCreated::class
    ];

    public function Wishlists(){
        return $this->hasMany(Wishlist::class,'author')->where('status','Active');
    }

    public function SharedWishlist(){
        return $this->belongsToMany(Wishlist::class,'visitor_wishlists','visitor','wishlist')->wherePivot('status','Active')->withPivot(['viewed'])->withTimestamps();
    }
}
