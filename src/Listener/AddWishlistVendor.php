<?php

namespace Milestone\Teebpd\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Milestone\Teebpd\Event\WishlistCreated;
use Milestone\Teebpd\Model\VendorWishlist;

class AddWishlistVendor
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
     * @param  WishlistCreated  $event
     * @return void
     */
    public function handle(WishlistCreated $event)
    {
        $event->wishlist->Vendor()->save((new VendorWishlist)->forceFill(['viewed' => $event->viewed]));
    }
}
