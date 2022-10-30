<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TestNotification extends Notification
{
    use Queueable;

    /**
     * @var string|null
     */
    private ?string $icon;

    /**
     * @var string|null
     */
    private ?string $message;

    /**
     * @param string|null $icon
     * @param string|null $message
     */
    public function __construct(?string $icon = null, ?string $message = null)
    {
        $this->icon = $icon;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via(mixed $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray(mixed $notifiable): array
    {
        return [
            'icon'    => $this->icon ?? fake()->randomElement(['success', 'warning', 'danger', 'info']),
            'message' => $this->message ?? fake()->realText(50),
            'read_at' => null,
        ];
    }
}