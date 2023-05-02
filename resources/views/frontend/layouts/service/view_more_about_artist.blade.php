@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')
<section class="course">
    <h1>Available packages</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    <div class="row justify-content-start">
        @foreach($packages as $package)
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$package->package_name}}</h5>
                    <p class="card-text">{{$package->description}}</p>
                    <p>{{$package->package_price}} TK</p>
                    <a href="{{route('add_cart',$package->id)}}" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection