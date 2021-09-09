@extends('layouts.default')

@section('content')

<div class="container">
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
    <div>
        <h2 class="text-muted text-center">My Bookings 123</h2>
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
                       
                        <td>{{$booking->service->service_name}}</td>
                        <td>{{$booking->scheduled_date}}</td>
                        <td>{{$booking->status}}</td>
                        <td>{{$booking->created_at}} @if($booking->status=='BOOKED')<button type="button"  value="{{$booking->id}}" class="btn btn-primary custom-cancel-btn" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button>@endif</td>
                  
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>



        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to cancel the booking?
      </div>
      <div class="modal-footer">
      <form action="/bookings/cancel" method="POST" >
         @csrf
         <input type="hidden" name="booking_id" id="cancel_id"/>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </form>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $(document).on('click', '.custom-cancel-btn',function(){
        $('#cancelModal').modal('show');
        $('#cancel_id').val($(this).val());    
    })
});
</script>
@endsection