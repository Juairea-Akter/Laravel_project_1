@extends('backend.master')
@section('content')
<form action="{{route('makeupartist_list_update', $user->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputName">Name</label>
      <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{$user->name}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email" value="{{$user->email}}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address" value="{{$user->address}}">
  </div>
  <div class="form-group">
    <label for="inputphone">Phone </label>
    <input type="tel" name="phone" class="form-control" id="inputphone" placeholder="Phone" value="{{$user->phone}}">
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
  <div class="input-group my-3">
    <label class="label">Status</label>
    <select name="status">
      <option disabled="disabled" selected="selected">Choose option</option>
      <option value="deactive">Deactive</option>
      <option value="approve">Approve</option>
      <option value="pending">Pending</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection