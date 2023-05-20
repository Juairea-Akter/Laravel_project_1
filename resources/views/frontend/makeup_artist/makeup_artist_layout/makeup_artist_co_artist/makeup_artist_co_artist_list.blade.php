@extends('frontend.makeup_artist.makeup_artist_master')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Co-Artist
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Personal Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('makeup_artist_co_artist_add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Co-Artist Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputDescription">
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputDescription">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="exampleInputDescription">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputDescription">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>
<table class="table dataTable">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">Makeup Artist Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($co_artists as $key => $co_artist)
        <tr>

            <td>{{$key+1}}</td>
            <td>{{$co_artist ->name}}</td>
            <td>{{$co_artist->artist->name}}</td>
            <td>{{$co_artist ->email}}</td>
            <td>{{$co_artist ->phone}}</td>
            <td>@if($co_artist->image == null)
                <img src="{{asset('/uploads/profile/dummy.jpg')}}" height="50px" width="50px">
                @else
                <img src="{{asset('/uploads/profile/'.$co_artist->image)}}" height="50px" width="50px">
                @endif
            </td>


            <td>
                <a class="btn btn" href="{{route('makeup_artist_co_artist_list_edit',$co_artist->id)}}" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delcatModal">
                    <i class="fa-solid fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="delcatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="delcatModal">Are you want to remove ?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a type="button" class="btn btn-danger" href="{{route('makeup_artist_co_artist_list_delete',$co_artist->id)}}">Confirm</a>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">NO</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $('.dataTable').DataTable();
</script>
@endsection