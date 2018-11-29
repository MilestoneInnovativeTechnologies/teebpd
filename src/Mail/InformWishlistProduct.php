<?php

namespace Milestone\Teebpd\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InformWishlistProduct extends Mailable
{
    use Queueable, SerializesModels;

    public $wishlist, $item, $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($wishlist)
    {
        $this->wishlist = $wishlist;
        $this->item = $wishlist->Items->count() > 0 ? $wishlist->Items[0] : null;
        $this->product = $this->item ? $this->item->Product : null;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('teebpd::email.informwishlistproductadded')->subject('[TEEB Emirates] - Product Added to Wish List by a Visitor');
    }
}
