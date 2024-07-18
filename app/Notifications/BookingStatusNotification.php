<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingStatusNotification extends Notification
{
    use Queueable;

    protected $booking;
    protected $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($booking, $status)
    {
        $this->booking = $booking;
        $this->status = $status;
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
        $mailMessage = (new MailMessage)
            ->subject('Booking Status Update')
            ->greeting('Hello ' . $this->booking->booking_name . ',');

        if ($this->status == 'rejected') {
            $mailMessage->line('Your booking for ' . optional($this->booking->venue)->venue_title . ' has been ' . $this->status . '.')
                ->line('Reason: ' . $this->booking->booking_reason);
        } else {
            $mailMessage->line('Your booking for ' . optional($this->booking->venue)->venue_title . ' has been ' . $this->status . '.')
                ->line('Do not forget to pay before your Starting date or your Booking will be denied : ' . $this->booking->booking_start_date . '.');
        }

        $mailMessage->line('Thank you for using our booking system!')
            ->salutation('Regards, CEVERUS');

        return $mailMessage;
    }
}
