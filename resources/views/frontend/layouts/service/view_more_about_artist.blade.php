@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')
<section class="course">
    <h1>Available packages</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    <div class="row">
        @foreach($packages as $package)
        <div class="course-col">
            <h3>{{$package->package_name}}</h3>
            <p>{{$package->description}}</p>
            <p>{{$package->package_price}} TK</p>
            <a href="{{route('add_cart',$package->id)}}" class="btn btn-primary">Add to cart</a>
        </div>
        @endforeach
    </div>
</section>
@endsection