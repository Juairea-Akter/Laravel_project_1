@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')
<section class="course">
    <h1>Choose Your Makeup Artist</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    <div class="row justify-content-start">
        @foreach($packs as $pack)
        @foreach($users as $user)
        @if($pack->makeup_artist_id == $user->id)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('/uploads/profile/'.$user->image)}}" class="card-img-top" alt="{{$user->image}}" style="max-height: 300px;object-fit: cover; object-position: top;">
                <div class="card-body">
                    <h5 class="card-title">{{$user->name}}</h5>
                    <p class="card-text">{{$user->description}}</p>
                    <a href="{{route('view_more',$user->id)}}" class="btn btn-primary">View more</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @endforeach
    </div>
</section>
@endsection