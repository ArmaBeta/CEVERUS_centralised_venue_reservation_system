<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\Booking;
use Illuminate\Support\Facades\Notification;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Review;
use App\Models\User;
use App\Notifications\VenueBooked;
use App\Notifications\BookingPaidNotification;
use App\Notifications\BookingStatusNotification;
use App\Notifications\BookingCancelledNotification;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function venue_details($id)
    {
        $venue = Venue::find($id);
        $reviews = Review::where('venue_id', $id)->get();
        $bookings = Booking::where('venue_id', $id)->get();
        $host = User::find($venue->user_id);

        return view('home.venue_details', compact('venue', 'reviews', 'bookings', 'host'));
    }

    public function add_booking(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after_or_equal:startDate',
            'purpose_booking' => 'required|string|max:500',
            'no_participants' => 'required|integer|min:1'
        ]);

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        // Check if the venue is already booked for the requested dates with approved and paid bookings
        $isBooked = Booking::where('venue_id', $id)
            ->where('booking_status', 'approved')
            ->whereHas('payment', function ($query) {
                $query->where('payment_status', 'paid');
            })
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->where('booking_start_date', '<=', $endDate)
                        ->where('booking_end_date', '>=', $startDate);
                });
            })
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('message', 'Venue is not available for the selected dates. Please select a different date.');
        }

        // Create a new booking
        $data = new Booking;
        $data->venue_id = $id;
        $data->booking_name = $request->name;
        $data->booking_email = $request->email;
        $data->booking_phone = $request->phone;
        $data->user_id = $request->user_id;
        $data->booking_start_date = $startDate;
        $data->booking_end_date = $endDate;
        $data->booking_purpose = $request->purpose_booking;
        $data->booking_no_participants = $request->no_participants;
        $data->booking_total = $request->booking_total;
        $data->booking_days = $request->booking_days;

        // Save the booking
        $data->save();

        // Get the venue and the host's email
        $venue = Venue::findOrFail($id);
        $host = User::findOrFail($venue->user_id);

        // Send email notification to the host
        Notification::route('mail', $host->email)->notify(new VenueBooked($venue, $request->user(), $data));

        return redirect()->back()->with('message', 'Venue Booked Successfully');
    }



    public function contact(Request $request)
    {
        $contact = new Contact;

        $contact->user_id = $request->user_id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('message', 'Message Sent Successfully');
    }

    public function all_venues(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $venue = Venue::where('venue_title', 'like', "%{$search}%")
                ->orWhere('venue_town', 'like', "%{$search}%")
                ->orWhere('venue_city', 'like', "%{$search}%")
                ->get();
        } else {
            $venue = Venue::all();
        }

        return view('home.all_venues', compact('venue'));
    }



    public function contact_us()
    {
        return view('home.contact_us');
    }

    public function register_host()
    {
        return view('auth.register_host');
    }

    public function my_bookings()
    {
        $data = Booking::all();

        foreach ($data as $booking) {
            $currentDate = now()->toDateString();
            if ($booking->booking_start_date <= $currentDate) {
                $payment = Payment::where('booking_id', $booking->id)->first();
                if (!$payment || $payment->payment_status != 'paid') {
                    $booking->booking_status = 'rejected';
                    $booking->booking_reason = 'Payment late';
                    $booking->save();
                }
            }
        }

        return view('home.my_bookings', compact('data'));
    }


    public function add_payment(Request $request)
    {
        $data = new Payment;

        $data->booking_id  = $request->booking_id;

        $data->payment_method  = $request->payment_method;

        $data->payment_bank_name = $request->payment_bank_name;

        $data->payment_network = $request->payment_payment_network;

        $data->payment_card_number = $request->payment_card_number;

        $data->payment_cardholder_name = $request->payment_cardholder_name;

        $data->payment_expiry_date = $request->payment_expiry_date;

        $data->payment_cvv = $request->payment_cvv;

        $data->payment_status = $request->payment_status;

        $data->save();
        $booking = Booking::findOrFail($request->booking_id);

        // Get the venue and the host's email
        $venue = Venue::findOrFail($booking->venue_id);
        $host = User::findOrFail($venue->user_id);

        // Send booking paid notification to the host
        $host->notify(new BookingPaidNotification($booking));

        return redirect()->back();
    }

    public function add_review(Request $request)
    {
        $data = new Review;

        $data->venue_id  = $request->venue_id;

        $data->user_id  = $request->user_id;

        $data->username = $request->username;

        $data->review_rating = $request->review_rating;

        $data->review_feedback = $request->review_feedback;

        $data->save();

        return redirect()->back();
    }

    public function cancelBooking(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Check if booking can be cancelled (pending or no payment made)
        if ($booking->booking_status == 'pending' || (!$booking->payment || $booking->payment->payment_status != 'paid')) {
            // Update booking status and reason
            $booking->booking_status = 'cancelled';
            $booking->booking_reason = $request->reason;
            $booking->save();

            // Notify the host of the venue about cancellation
            $venue = Venue::findOrFail($booking->venue_id);
            $host = User::findOrFail($venue->user_id);

            // Send email notification to the host
            $host->notify(new BookingCancelledNotification($booking));

            return redirect()->back()->with('success', 'Booking has been cancelled successfully.');
        } else {
            return redirect()->back()->with('error', 'Booking cannot be cancelled.');
        }
    }
}
