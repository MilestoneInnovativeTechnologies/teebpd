<?php

namespace Milestone\Teebpd\Listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Milestone\Teebpd\Event\SavingWishlistVisitor;
use Milestone\Teebpd\Model\VisitorWishlist;

class PreventWishlistVisitorIfAlreadyIn
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
     * @return bool
     */
    public function handle(SavingWishlistVisitor $event)
    {
        $VWL = $event->VisitorWL;
        if(!$VWL || $VWL->isEmpty()) return true;
        if($VWL->where('status','Active')->count() > 0) return false;
        return true;
    }
}
