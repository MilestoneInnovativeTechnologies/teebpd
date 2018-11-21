<?php

namespace Milestone\Teebpd\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use Milestone\Teebpd\Model\Wishlist;

class WishlistCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $wishlist, $viewed;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($wishlist)
    {
        $wishlist = Wishlist::find($wishlist->id);
        $this->wishlist = $wishlist;
        $this->viewed = $wishlist->author ? 'No' : 'Yes';
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
