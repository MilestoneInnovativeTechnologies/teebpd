<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class VisitorWishlist extends Model
{
    protected $table = 'visitor_wishlists';

    protected $dispatchesEvents = [
        'created' => \Milestone\Teebpd\Event\NewWishlistShare::class
    ];

    public function Wishlist(){
        return $this->belongsTo(Wishlist::class,'wishlist');
    }

    public function Visitor(){
        return $this->belongsTo(Visitor::class,'visitor');
    }
}
