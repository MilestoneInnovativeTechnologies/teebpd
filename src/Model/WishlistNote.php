<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class WishlistNote extends Model
{
    protected $table = 'wishlist_notes';

    public function Author(){
        return $this->belongsTo(Visitor::class,'author')->withDefault(['name' => 'Vendor', 'email' => 'no-replay@example.com', 'number' => '971']);
    }
}
