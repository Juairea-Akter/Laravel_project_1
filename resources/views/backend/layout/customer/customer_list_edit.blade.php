@extends('backend.master')
@section('content')
<form action="{{route('customer_list_update', $user->id)}}" method="post">
    @csrf
    @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" value="{{$user->name}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="email" value="{{$user->email}}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address" value="{{$user->address}}">
  </div>
  <div class="form-group">
    <label for="inputphone">Phone </label>
    <input type="tel" class="form-control" name="phone" id="inputphone" placeholder="Phone" value="{{$user->phone}}">
  </div>
  <br>
  <div class="form-group">
    @if($user -> image == null)
    <img src="{{asset('/uploads/profile/dummy.jpg')}}" height="50px" width="50px">
    @else
    <img src="{{asset('/uploads/profile/'.$user->image)}}" height="50px" width="50px">
    @endif
    <label for="inputimage">Image</label>
    <input type="file" name="image" class="form-control" id="inputimage" placeholder="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection