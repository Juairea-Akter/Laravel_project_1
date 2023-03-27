@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')
<section class="course">
    <h1>Choose Your Makeup Artist</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    <div class="row">
        @foreach($packs as $pack)
        @foreach($users as $user)
        @if($pack->makeup_artist_id == $user->id)
        <div class="course-col">
            <h3>{{$user->name}}</h3>
            <p>{{$user->description}}</p>
            <a href="{{route('view_more',$user->id)}}" class="btn btn-primary">View more</a>
        </div>
        @endif
        @endforeach
        @endforeach
    </div>
</section>
@endsection