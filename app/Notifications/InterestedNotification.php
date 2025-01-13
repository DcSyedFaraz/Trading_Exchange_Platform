<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InterestedNotification extends Notification
{
    use Queueable;

    protected $product;
    protected $user;

    public function __construct($product, $user)
    {
        $this->product = $product;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "{$this->user->name} is interested in your product: {$this->product->name}",
            'product_id' => $this->product->id,
            'user_id' => $this->user->id,
        ];
    }
}
