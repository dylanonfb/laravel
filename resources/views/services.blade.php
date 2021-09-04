@extends('layouts.default')

@section('content')

<div class="container">
    <div>
        <h2 class="text-muted text-center">Please select from the wide range of our services</h2>
        <div class="row">

            @if($services->isEmpty())
            <p class="text-muted text-center">Oops!! No services found. Please check back later.</p>
            @else
            @foreach($services as $service)

            <div class="col-xs-6 col-md-4">
                <!--service card-->
                <div class="card mb-2" style="width: 18rem;">
                    <img class="card-img-top" src="/images/services/{{$service->slug}}.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$service->service_name}}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <form action="/booknow" method="get">
                            <input type=hidden name="sid" value="{{$service->id}}">
                            <input type=hidden name="service" value="{{$service->service_name}}">
                            <button class="btn btn-primary" onclick="submit">Book Now</button>
                        </form>
                    </div>
                </div>

                <!--end service card-->
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

@endsection