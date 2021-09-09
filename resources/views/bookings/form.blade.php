@extends('layouts.default')

@section('content')

<div class="container">
    <div>
        <h2 class="text-muted text-center">book now</h2>
        <div class="row">
            <form action="/bookconfirm" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="hidden" name="sid" value="{{$_GET['sid']}}">
                    <span class="input-group-text" id="basic-addon1">{{$_GET['service']}}</span>
                    <span class="input-group-text" id="basic-addon1">Schedule Date</span>
                    <input type="text" id="datepicker" class="date form-control" placeholder="Date" aria-label="Schedule Date" name="date" aria-describedby="basic-addon1" required>

                </div>
                <button class="btn btn-primary" onclick="submit">Confirm Booking</button>
            </form>
        </div>
        @if(count($errors))

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.

            <br />

            <ul>

                @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif
       
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            todayHighlight: true,
            autoclose: true,
        });
    });
</script>
@endsection