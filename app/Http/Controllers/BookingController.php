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
        $bookings = Booking::where('user_id', '=', Auth::user()->id)->get();
        return view('bookings.list', [
            'bookings' => $bookings
        ]);
    }

    public function form()
    {
        return view('bookings.form');
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'sid' => 'required|numeric',
                'date' => 'required|date_format:m/d/Y|max:10'
            ]
        );
        $booking=new Booking();
        $booking->user_id=Auth::user()->id;
        $booking->service_id=$_REQUEST['sid'];
        $booking->scheduled_date=Carbon::parse($_REQUEST['date']);
        $booking->status='BOOKED';
        $booking->save();
        session()->flash('message','Your booking has been processed');
        return redirect('/bookings');
    }

    public function cancel(Request $request)
    {

        $this->validate(
            $request,
            [
                'booking_id' => 'required|numeric',
            ]
        );
        
        $booking=Booking::findOrFail($request->booking_id) ;
        if(Auth::user()->id==$booking->user_id){
            $booking->status='CANCELLED';
            $booking->save();
            session()->flash('message','Your booking has been cancelled');
         }
        else {
            session()->flash('error','booking cannot be updated');
        }
        return redirect('/bookings');
    }
}
