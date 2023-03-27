@extends('frontend.master')
@section('content')
@include('frontend.include.header')

<section class="course" id="serviceSection">

    <h1>Choose Your Makeup Category</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>

    <div class="row">
        @foreach($services as $service)
        <div class="course-col">
            <h3>{{$service->name}}</h3>
            <p>{{$service->description}}</p>
            <a href="{{route('view_details',$service->id)}}" class="btn btn-primary">View Details</a>
        </div>
        @endforeach

    </div>
</section>

@endsection