@extends('frontend.master')
@section('content')
@include('frontend.include.header')

<section class="course" id="serviceSection">

    <h1>Choose Your Makeup Category</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>

    <div class="row justify-content-start">
        @foreach($services as $service)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('/uploads/profile/'.$service->image)}}" class="card-img-top" alt="{{$service->image}}" style="max-height: 300px;object-fit: cover; object-position: top;">
                <div class="card-body">
                    <h5 class="card-title">{{$service->name}}</h5>
                    <p class="card-text">{{$service->description}}</p>
                    <a href="{{route('view_details',$service->id)}}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>

@endsection