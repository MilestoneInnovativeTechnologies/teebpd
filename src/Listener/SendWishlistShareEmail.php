<?php

namespace Milestone\Teebpd\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Milestone\Teebpd\Controller\VisitorController;
use Milestone\Teebpd\Controller\WishListController;
use Milestone\Teebpd\Event\NewWishlistShare;

class SendWishlistShareEmail
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
    public function handle(NewWishlistShare $event)
    {
        $WLS = $event->WishlistVisitor;
        $Arg1 = $WLS->Wishlist;
        $Visitor = (new VisitorController)->getCurrentVisitor();
        $Arg2 = $Visitor ?: $WLS->Wishlist->Author;
        $Arg3 = $WLS->Visitor;
        (new WishListController)->email($Arg1,$Arg2,$Arg3);
    }
}
