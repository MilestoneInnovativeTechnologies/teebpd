<?php

namespace Milestone\Teebpd\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShareWishlist extends Mailable
{
    use Queueable, SerializesModels;

    public $sharer, $sharee, $sharelink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sharer,$sharee,$sharecode)
    {
        $this->sharer = $sharer;
        $this->sharee = $sharee;
        $this->sharelink = route('share.in',$sharecode);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('teebpd::email.sharewishlist')->subject('[TEEB Emirates] - Wish List shared with You');
    }
}
