<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Venue;

use App\Models\Booking;

use App\Models\Contact;

use App\Models\Review;

use App\Notifications\SendEmailNotification;

use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $venue = Venue::all();
                return view('home.index', compact('venue'));
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else if ($usertype == 'host') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
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
        $data = Booking::all();
        return view('admin.booking', compact('data'));
    }

    public function approve_book($id)
    {
        $booking = Booking::find($id);

        $booking->booking_status = 'approved';

        $booking->save();

        return redirect()->back();
    }

    public function reject_book(Request $request, $id)
    {
        $booking = Booking::find($id);

        $booking->booking_status = 'rejected';

        $booking->booking_reason = $request->booking_reason;

        $booking->save();

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

        return redirect()->back();
    }

    public function reject_venue(Request $request, $id)
    {
        $venue = Venue::find($id);

        $venue->venue_status = 'reject';

        $venue->venue_reason = $request->venue_reason;

        $venue->save();

        return redirect()->back();
    }
}
