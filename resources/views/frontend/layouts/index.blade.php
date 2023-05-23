@extends('frontend.master')
@section('content')
@include('frontend.include.header')

<section class="course" id="serviceSection">

    <h1>Choose Your Makeup Category</h1>
    <p>Here you will find the best deal packages from top makeup artists</p>

    <div class="row justify-content-start">
        @foreach($services as $service)
        <div class="col-4">
            <div class="card h-100">
                <img src="{{asset('/uploads/profile/'.$service->image)}}" class="card-img-top" alt="{{$service->image}}" style="max-height: 300px;object-fit: cover; object-position: top;">
                <div class="card-body d-flex flex-column justify-content-between align-items-center">
                    <h5 class="card-title">{{$service->name}}</h5>
                    <p class="card-text">{{$service->description}}</p>
                    <a href="{{route('view_details',$service->id)}}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    
    <div class="my-5 border p-4 rounded">
        <h2>Searching for specific services?</h2>
        <p>Select what you need here</p>

        <a href="{{
            route('custom_package_create_form')
        }}" class="btn btn-primary btn-lg">Select</a>
    </div>
</section>

@endsection