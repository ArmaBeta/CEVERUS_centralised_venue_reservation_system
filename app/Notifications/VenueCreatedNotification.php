<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Venue;

class VenueCreatedNotification extends Notification
{
    use Queueable;

    protected $venue;

    public function __construct(Venue $venue)
    {
        $this->venue = $venue;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Venue Created')
            ->line('A new venue has been added to the system.')
            ->line('Thank you for using our application!')
            ->salutation('Regards, CEVERUS');
    }

    public function toArray($notifiable)
    {
        return [
            // Additional data to be sent in the notification
        ];
    }
}
