<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Booking;

class BookingCancelledNotification extends Notification
{
    use Queueable;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Booking Cancelled Notification')
            ->line('Your booking has been cancelled.')
            ->line('Reason: ' . $this->booking->booking_reason)
            ->line('Thank you for using our application!')
            ->salutation('Regards, CEVERUS');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
