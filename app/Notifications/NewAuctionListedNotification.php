<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAuctionListedNotification extends Notification
{
    use Queueable;

    protected $auction;

    public function __construct($auction)
    {
        $this->auction = $auction;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'A new auction has been listed: ' . $this->auction->name,
        ];
    }
}
