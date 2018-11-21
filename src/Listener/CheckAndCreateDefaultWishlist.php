<?php

namespace Milestone\Teebpd\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Milestone\Teebpd\Model\Wishlist;

class CheckAndCreateDefaultWishlist
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if($event->visitor->Wishlists->isEmpty()) {
            $visitor = $event->visitor;
            $visitor->Wishlists()->save((new Wishlist)->forceFill(['name' => $visitor->name . "'s Wish List",'description' => 'My default wish list']));
        }
    }
}
