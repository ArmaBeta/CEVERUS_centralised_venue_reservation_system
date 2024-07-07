<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VenueBooked extends Notification
{
    use Queueable;

    protected $venue;
    protected $user;
    protected $booking;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($venue, $user, $booking)
    {
        $this->venue = $venue;
        $this->user = $user;
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Venue Booked Notification')
            // ->greeting('Hello ' . $notifiable->name)
            ->line('Your venue ' . $this->venue->venue_title . ' has been booked by ' . $this->user->name . '.')
            ->line('Booking Details:')
            ->line('Start Date: ' . $this->booking->booking_start_date)
            ->line('End Date: ' . $this->booking->booking_end_date)
            ->line('Purpose: ' . $this->booking->booking_purpose)
            ->line('Date: ' . now()->format('Y-m-d H:i:s'))
            ->line('Thank you for using our application!')
            ->salutation('Regards, CEVERUS');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
