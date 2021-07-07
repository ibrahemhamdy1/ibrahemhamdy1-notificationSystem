<?php

namespace App\Notifications;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\NexmoMessage;

class UserNotification extends Notification
{
    use Queueable;

    /**
     * The notification content.
     *
     * @var string
     */
    private $content;

    /**
     * Array has the channels of the notification.
     *
     * @var array
     */
    private $via;

    /**
     * Create a new notification instance.
     *
     * @param  mixed  $content
     * @param  array  $via
     *
     * @return void
     */
    public function __construct($content, array $via)
    {
        $this->content = $content;
        $this->via = $via;
        if (!(in_array('database', $this->via) || in_array('nexmo', $this->via))) {
            throw new Exception('You send out the wrong notification channel');
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return $this->via;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'content' => $this->content,
        ];
    }

    /**
     * Get the Vonage / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return \Illuminate\Notifications\Messages\NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
                ->content($this->content);
    }
}
