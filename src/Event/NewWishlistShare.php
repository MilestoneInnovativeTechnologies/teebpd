<?php

namespace Milestone\Teebpd\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Milestone\Teebpd\Model\VisitorWishlist;

class NewWishlistShare
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $WishlistVisitor;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($record)
    {
        $WLS = VisitorWishlist::with(['Wishlist','Visitor'])->find($record->id);
        $this->WishlistVisitor = $WLS;//->load(['Wishlist','Visitor']);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
