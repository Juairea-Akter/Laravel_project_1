@extends('backend.master')
@section('content')
<div class="py-5">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Phone</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $key => $user)
      <!-- @if($user->role_id == 3) -->
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->address}}</td>
        <td>{{$user->phone}}</td>
        <td>@if($user->image == null)
          <img src="{{asset('/uploads/profile/dummy.jpg')}}" height="50px" width="50px">
          @else
          <img src="{{asset('/uploads/profile/'.$user->image)}}" height="50px" width="50px">
          @endif
        </td>

        <td>
          <a class="btn btn" href="{{route('customer_list_edit',$user->id)}}" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa-solid fa-trash"></i>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you want to remove ?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <a type="button" class="btn btn-danger" href="{{route('customer_list_delete',$user->id)}}">Confirm</a>
                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">NO</button>
                </div>
              </div>
            </div>
        </td>
      </tr>
      <!-- @endif -->
      @endforeach
    </tbody>
  </table>
</div>
@endsection