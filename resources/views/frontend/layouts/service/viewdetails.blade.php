@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')
<section class="course">
    <h1>Choose Your Makeup sub Category</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    <div class="row justify-content-start">
        @foreach($sub_categories as $sub_category)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('/uploads/profile/'.$sub_category->image)}}" class="card-img-top" alt="{{$sub_category->image}}" style="max-height: 300px;object-fit: cover; object-position: top;">
                <div class="card-body">
                    <h5 class="card-title">{{$sub_category->name}}</h5>
                    <p class="card-text">{{$sub_category->description}}</p>
                    <a href="{{route('choose_artist',$sub_category->id)}}" class="btn btn-primary">Choose Artist</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection