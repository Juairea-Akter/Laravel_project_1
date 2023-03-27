@extends('frontend.makeup_artist.makeup_artist_master')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Packages

</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new Pcakage</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('makeup_artist_service_add')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputCategoryName" class="form-label">Category Name</label>
                        <select name="cat_id" id="exampleInputDescription" class="form-control">
                            <option value="">Choose...</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCategoryName" class="form-label">Sub Category Name</label>
                        <select name="sub_cat_id" id="exampleInputDescription" class="form-control">
                            <option value="">Choose...</option>
                            @foreach($sub_categories as $sub_category)
                            <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputservice" class="form-label">Package name</label>
                        <input type="text" class="form-control" name="package_name" id="exampleInputservice">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputservice" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="exampleInputservice">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputservice" class="form-label">Price</label>
                        <input type="text" class="form-control" name="package_price" id="exampleInputservice">
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
            <th scope="col">Package Name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Sub Category Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($packages as $key => $packages)
        <tr>

            <td>{{$key+1}}</td>
            <td>{{$packages ->package_name}}</td>
            <td>{{$packages ->category->name}}</td>
            <td>{{$packages->sub_category->name}}</td>
            <td>{{$packages ->description}}</td>
            <td>{{$packages ->package_price}}</td>

            <td>
                <a class="btn btn" href="{{route('makeup_artist_service_edit',$packages->id)}}" role="button"><i class="fa-solid fa-pen-to-square"></i></a>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                    <i class="fa-solid fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you want to remove ?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a type="button" class="btn btn-danger" href="{{route('makeup_artist_service_delete',$packages->id)}}">Confirm</a>
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