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

class SavingWishlistVisitor
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $VisitorWL;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($record)
    {
        $this->VisitorWL = VisitorWishlist::where(['wishlist' => $record->wishlist, 'visitor' => $record->visitor])->get();
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
