@extends('backend.master')
@section('content')
<form action="{{route('cat_update',$category->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputCategoryName" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputCategoryName" placeholder="Enter your name" value="{{$category->name}}">


    </div>
    <div class="mb-3">
        <label for="exampleInputDescription" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" id="exampleInputDescription" placeholder="Enter address" value="{{$category->description}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection