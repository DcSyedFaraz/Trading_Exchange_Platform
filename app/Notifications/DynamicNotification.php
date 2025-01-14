<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DynamicNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $url;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @param string $message The dynamic message to be sent
     * @param string $url The dynamic URL to be included
     * @return void
     */
    public function __construct(string $message, string $url)
    {
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'url' => $this->url,
            'sent_at' => now(),
        ];
    }


}
