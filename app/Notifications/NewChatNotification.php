<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewChatNotification extends Notification
{
    use Queueable;

    protected $chat;

    public function __construct($chat)
    {
        $this->chat = $chat;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {

        $url = route('chats.show', $this->chat->id);

        return [
            'chat_id' => $this->chat->id,
            'message' => 'A new chat has been initiated with product: ' . $this->chat->product->name,
            'url' => $url,
        ];
    }
}
