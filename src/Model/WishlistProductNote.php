<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class WishlistProductNote extends Model
{
    protected $table = 'wishlist_product_notes';

    public function Author(){
        return $this->belongsTo(Visitor::class,'author')->withDefault(['name' => 'Vendor', 'email' => 'no-replay@example.com', 'number' => '971']);
    }
}
