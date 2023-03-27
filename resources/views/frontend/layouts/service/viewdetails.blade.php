@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')
<section class="course">
    <h1>Choose Your Makeup sub Category</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    <div class="row">
        @foreach($sub_categories as $sub_category)
        <div class="course-col">
            <h3>{{$sub_category->name}}</h3>
            <p>{{$sub_category->description}}</p>
            <a href="{{route('choose_artist',$sub_category->id)}}" class="btn btn-primary">Choose Artist</a>
        </div>
        @endforeach
    </div>
</section>
@endsection