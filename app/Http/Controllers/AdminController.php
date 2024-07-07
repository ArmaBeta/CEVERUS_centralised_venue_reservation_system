<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Venue;

use App\Models\Booking;

use App\Models\Contact;

use App\Models\Review;

use App\Models\Payment;

use App\Notifications\SendEmailNotification;

use App\Notifications\BookingStatusNotification;

use App\Notifications\VenueCreatedNotification;

use App\Notifications\VenueStatusNotification;

use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $usertype = $user->usertype;

        if ($usertype == 'user') {
            $venue = Venue::all();
            return view('home.index', compact('venue'));
        } elseif ($usertype == 'admin') {
            // Count total bookings
            $totalBookings = Booking::count();

            // Count users based on usertype
            $totalUsers = User::where('usertype', 'user')->count();
            $totalHosts = User::where('usertype', 'host')->count();
            $totalAdmins = User::where('usertype', 'admin')->count();

            // Count total venues
            $totalVenues = Venue::count();

            // Count venues by status
            $totalApprovedVenues = Venue::where('venue_status', 'approved')->count();
            $totalRejectedVenues = Venue::where('venue_status', 'reject')->count();
            $totalPendingVenues = $totalVenues - ($totalApprovedVenues + $totalRejectedVenues);

            // Count bookings by status
            $totalApprovedBookings = Booking::where('booking_status', 'approved')->count();
            $totalRejectedBookings = Booking::where('booking_status', 'rejected')->count();
            $totalPendingBookings = $totalBookings - ($totalApprovedBookings + $totalRejectedBookings);

            // Fetch venues with bookings count
            $venues = Venue::withCount('bookings')->get();

            return view('admin.index', compact(
                'venues',
                'totalBookings',
                'totalUsers',
                'totalHosts',
                'totalAdmins',
                'totalVenues',
                'totalApprovedVenues',
                'totalRejectedVenues',
                'totalPendingVenues',
                'totalApprovedBookings',
                'totalRejectedBookings',
                'totalPendingBookings'
            ));
        } elseif ($usertype == 'host') {
            // Fetch only the venues added by the host
            $venues = Venue::where('user_id', $user->id)->withCount('bookings')->get();

            // Count total bookings for the host's venues
            $totalBookings = Booking::whereIn('venue_id', $venues->pluck('id'))->count();

            // Count bookings by status for the host's venues
            $totalApprovedBookings = Booking::whereIn('venue_id', $venues->pluck('id'))
                ->where('booking_status', 'approved')
                ->count();
            $totalRejectedBookings = Booking::whereIn('venue_id', $venues->pluck('id'))
                ->where('booking_status', 'rejected')
                ->count();
            $totalPendingBookings = $totalBookings - ($totalApprovedBookings + $totalRejectedBookings);

            // Count total venues for the host
            $totalVenues = $venues->count();

            // Count venues by status for the host
            $totalApprovedVenues = $venues->where('venue_status', 'approved')->count();
            $totalRejectedVenues = $venues->where('venue_status', 'reject')->count();
            $totalPendingVenues = $totalVenues - ($totalApprovedVenues + $totalRejectedVenues);

            return view('admin.index', compact(
                'venues',
                'totalBookings',
                'totalApprovedBookings',
                'totalRejectedBookings',
                'totalPendingBookings',
                'totalVenues',
                'totalApprovedVenues',
                'totalRejectedVenues',
                'totalPendingVenues'
            ));
        } else {
            return redirect()->back();
        }
    }



    public function home()
    {
        $venue = Venue::all();
        return view('home.index', compact('venue'));
    }

    public function create_venue()
    {
        return view('admin.create_venue');
    }

    public function add_venue(Request $request)
    {
        $data = new Venue();

        $data->venue_title = $request->title;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('venue', $imagename);

            $data->image = $imagename;
        }

        $data->venue_address = $request->address;

        $data->venue_town = $request->town;

        $data->venue_postcode = $request->postcode;

        $data->venue_city = $request->city;

        $data->venue_size = $request->size;

        $data->venue_availability = $request->availability;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->user_id = $request->user_id;

        $data->venue_status = $request->venue_status;

        $data->save();

        $adminEmail = 'armansyahin@gmail.com';
        Notification::route('mail', $adminEmail)
            ->notify(new VenueCreatedNotification($data));

        return redirect()->back();
    }

    public function view_venue()
    {
        $data = Venue::all();

        return view('admin.view_venue', compact('data'));
    }

    public function venue_delete($id)
    {
        $data = Venue::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function venue_update($id)
    {
        $data = Venue::find($id);

        return view('admin.update_venue', compact('data'));
    }

    public function edit_venue(Request $request, $id)
    {
        $data = Venue::find($id);

        $data->venue_title = $request->title;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('venue', $imagename);

            $data->image = $imagename;
        }

        $data->venue_address = $request->address;

        $data->venue_town = $request->town;

        $data->venue_postcode = $request->postcode;

        $data->venue_city = $request->city;

        $data->venue_size = $request->size;

        $data->venue_availability = $request->availability;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->venue_status = $request->venue_status;

        $data->save();

        return redirect()->route('admin.view_venue', ['id' => $data->id]);
    }

    public function bookings()
    {
        $data = Booking::with('venue')->get();

        foreach ($data as $booking) {
            $payment = \App\Models\Payment::where('booking_id', $booking->id)->first();
            $booking->setAttribute('payment_status', $payment ? 'Paid' : 'None');
        }

        return view('admin.booking', compact('data'));
    }

    public function approve_book($id)
    {
        $booking = Booking::find($id);

        $booking->booking_status = 'approved';
        $booking->save();

        // Send email notification
        Notification::route('mail', $booking->booking_email)
            ->notify(new BookingStatusNotification($booking, 'approved'));

        return redirect()->back();
    }

    public function reject_book(Request $request, $id)
    {
        $booking = Booking::find($id);

        $booking->booking_status = 'rejected';
        $booking->booking_reason = $request->booking_reason;
        $booking->save();

        // Send email notification
        Notification::route('mail', $booking->booking_email)
            ->notify(new BookingStatusNotification($booking, 'rejected'));

        return redirect()->back();
    }


    public function all_messages()
    {
        $data = Contact::all();

        return view('admin.all_messages', compact('data'));
    }

    public function send_mail($id)
    {
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }

    public function mail(Request $request, $id)
    {
        $data = Contact::find($id);

        $details = [
            'greeting' => $request->greeting,

            'body' => $request->body,

            'action_text' => $request->action_text,

            'action_url' => $request->action_url,

            'endline' => $request->endline,

        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back();
    }

    public function venue_admin_details($id)
    {
        $venue = Venue::find($id);
        $reviews = Review::where('venue_id', $id)->get();

        return view('admin.venue_admin_details', compact('venue', 'reviews'));
    }

    public function approve_venue($id)
    {
        $venue = Venue::find($id);

        $venue->venue_status = 'approved';
        $venue->save();

        // Send email notification to the host
        $host = User::find($venue->user_id);
        if ($host) {
            $host->notify(new VenueStatusNotification($venue, 'approved'));
        }

        return redirect()->back();
    }

    public function reject_venue(Request $request, $id)
    {
        $venue = Venue::find($id);

        $venue->venue_status = 'reject';
        $venue->venue_reason = $request->venue_reason;
        $venue->save();

        // Send email notification to the host
        $host = User::find($venue->user_id);
        if ($host) {
            $host->notify(new VenueStatusNotification($venue, 'rejected'));
        }

        return redirect()->back();
    }




    public function view_users()
    {
        $data = User::all();

        return view('admin.view_users', compact('data'));
    }

    public function add_admin()
    {
        return view('auth.add_admin');
    }

    public function store_admin(Request $request)
    {
        // Validate input
        $user = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'usertype' => 'required|string|in:admin',
        ]);

        // Create new admin user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->back()->with('success', 'Admin added successfully.');
    }

    public function delete_admin($id)
    {
        $data = User::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function payment_details($id)
    {
        $payment = Payment::where('booking_id', $id)->first(); // Fetch the payment based on booking ID
        $booking = Booking::find($id); // Fetch the booking based on booking ID

        if (!$payment) {
            // Handle the case where no payment is found for the given booking ID
            return redirect()->back()->with('error', 'No payment details found for this booking.');
        }

        return view('admin.payment_details', compact('payment', 'booking'));
    }

    public function booking_details($id)
    {
        $booking = Booking::with('venue')->findOrFail($id); // Fetch the booking based on the ID with the related venue

        return view('admin.booking_details', compact('booking'));
    }

    public function search_venues(Request $request)
    {
        $query = $request->input('query');
        $data = Venue::where('venue_title', 'LIKE', "%{$query}%")
            // ->orWhere('venue_town', 'LIKE', "%{$query}%")
            // ->orWhere('venue_city', 'LIKE', "%{$query}%")
            ->get();

        return view('admin.view_venue', compact('data'));
    }

    public function search_bookings(Request $request)
    {
        $query = $request->input('query');
        $data = Booking::where('booking_name', 'LIKE', "%{$query}%")->get();

        return view('admin.booking', compact('data'));
    }

    public function search_users(Request $request)
    {
        $query = $request->input('query');

        // Perform search query
        $data = User::where('name', 'LIKE', "%{$query}%")->get();

        return view('admin.view_users', compact('data'));
    }
}
