<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Booking;

class BookingPaidNotification extends Notification
{
    use Queueable;

    protected $booking;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Booking Payment Confirmation')
            ->line('Your venue booking has been paid.')
            ->line('Booking ID: ' . $this->booking->id)
            ->line('Booker name: ' . $this->booking->booking_name)
            ->line('Booking Payment: ' . $this->booking->booking_total)
            ->line('Thank you for using our application!')
            ->salutation('Regards, CEVERUS');
    }
}
