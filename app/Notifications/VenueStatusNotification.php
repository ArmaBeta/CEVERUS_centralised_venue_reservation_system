<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Venue;

class VenueStatusNotification extends Notification
{
    use Queueable;

    protected $venue;
    protected $status;

    public function __construct(Venue $venue, $status)
    {
        $this->venue = $venue;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $message = (new MailMessage)
            ->subject('Venue Status Update')
            ->line('Your venue "' . $this->venue->venue_title . '" has been ' . $this->status . ' by the admin.')
            ->salutation('Regards, CEVERUS');

        if ($this->status == 'rejected') {
            $message->line('Reason for rejection: ' . $this->venue->venue_reason);
        }

        return $message;
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
