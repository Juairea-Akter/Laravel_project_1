@extends('backend.master')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addCatModal">
    Add category name
</button>

<!-- Modal -->
<div class="modal fade" id="addCatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('cat_add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputCategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputCategoryName">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="exampleInputDescription">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputDescription">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
<hr>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $key => $category)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$category ->name}}</td>
            <td>{{$category ->description}}</td>
            <td>@if($category->image == null)
                <img src="{{asset('/uploads/profile/dummy.jpg')}}" height="50px" width="50px">
                @else
                <img src="{{asset('/uploads/profile/'.$category->image)}}" height="50px" width="50px">
                @endif
            </td>
            <td>
                <a class="btn btn" href="{{route('cat_edit',$category->id)}}" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
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
                                <a type="button" class="btn btn-danger" href="{{route('cat_delete',$category->id)}}">Confirm</a>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">NO</button>
                            </div>
                        </div>
                    </div>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>
@endsection