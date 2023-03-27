@extends('frontend.makeup_artist.makeup_artist_master')
@section('content')
<form action="{{route('makeup_artist_co_artist_list_update',$co_artist->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Co-Artist Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputDescription" value="{{$co_artist->name}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputDescription" value="{{$co_artist->email}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Phone</label>
    <input type="tel" class="form-control" name="phone" id="exampleInputDescription" value="{{$co_artist->phone}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Image</label>
    <input type="file" class="form-control" name="image" id="exampleInputDescription" value="{{$co_artist->image}}">
  </div>
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
@endsection



