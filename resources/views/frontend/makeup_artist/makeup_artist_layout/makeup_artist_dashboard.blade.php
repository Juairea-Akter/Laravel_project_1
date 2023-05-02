@extends('frontend.makeup_artist.makeup_artist_master')
@section('content')
<h1>Makeup artist dashboard</h1>


<div class="row">
    <div class="col-12 grid-margic">

        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Appointment</label>
                    <h1>{{$totalAppointments}}</h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total co artist</label>
                    <h1>{{$totalCoArtist}}</h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total packages</label>
                    <h1>{{$totalPackages}}</h1>

                </div>
            </div>


        </div>

    </div>
</div>
@endsection