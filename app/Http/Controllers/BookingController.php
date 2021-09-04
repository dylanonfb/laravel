<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function show()
    {
        $bookings=Booking::where('user_id','=',Auth::user()->id)->get();
        return view('bookings.list', [
            'bookings' => $bookings
        ]);
    }

    public function form()
    {
        return view('bookings.form');
    }
    
    public function store()
    {
        $booking=new Booking();
        $booking->user_id=Auth::user()->id;
        $booking->service_id=$_REQUEST['sid'];
        $booking->scheduled_date=Carbon::parse($_REQUEST['date']);
        $booking->status='BOOKED';
        $booking->save();
        return redirect('/bookings');
    }
}
