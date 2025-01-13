<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBidOnAuctionNotification extends Notification
{
    use Queueable;

    protected $auctionProduct;
    protected $bid;

    public function __construct($auctionProduct, $bid)
    {
        $this->auctionProduct = $auctionProduct;
        $this->bid = $bid;
    }

    public function via($notifiable)
    {
        return ['database'];  // Database ke through notification bhejna
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'A new bid of ' . $this->bid->amount . ' has been placed on auction: ' . $this->auctionProduct->name,
            'auction_product_id' => $this->auctionProduct->id,
            'bid_amount' => $this->bid->amount,
            'user_id' => $this->bid->user_id,
        ];
    }
}
