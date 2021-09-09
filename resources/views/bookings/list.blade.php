@extends('layouts.default')

@section('content')

<div class="container">
    <div>
        <h2 class="text-muted text-center">My Bookings</h2>
        <div class="row">

            @if($bookings->isEmpty())
            <p class="text-muted text-center">You do not have any booking</p>
            @else
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Booking id</th>
                        <th scope="col">Service</th>
                        <th scope="col">Schedule date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Booking date</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach($bookings as $booking)
                    <tr>
                        <th scope="row">{{$booking->id}}</th>
                        <form action="/bookings/cancel" method="POST">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{$booking->id}}"/>
                        <td>{{$booking->service->service_name}}</td>
                        <td>{{$booking->scheduled_date}}</td>
                        <td>{{$booking->status}}</td>
                        <td>{{$booking->created_at}} @if($booking->status=='BOOKED')<button class="btn btn-primary" onclick="submit">Cancel</button>@endif</td>
                        </form>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            @if(session()->has('message'))
            <div class="alert alert-success">

                <strong> {{session('message')}}</strong>

            </div>

            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">

                <strong> {{session('error')}}</strong>

            </div>

            @endif
        </div>
    </div>
</div>

@endsection