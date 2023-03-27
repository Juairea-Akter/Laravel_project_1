@extends('frontend.makeup_artist.makeup_artist_master')
@section('content')

<form action="{{route('makeup_artist_service_update',$package->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputCategoryName" class="form-label">Category Name</label>
        <select name="cat_id" id="exampleInputDescription" class="form-control" >
            <option value="">Choose...</option>
            @foreach($categories as $category)
            <option @if($package->cat_id == $category->id)selected @endif value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputCategoryName" class="form-label">Sub Category Name</label>
        <select name="sub_cat_id" id="exampleInputDescription" class="form-control" >
            <option >Choose...</option>
            @foreach($sub_categories as $sub_category)
            <option @if($package->sub_cat_id == $sub_category->id)selected @endif value="{{$sub_category->id}}">{{$sub_category->name}}</option>

            
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputservice" class="form-label">Package name</label>
        <input type="text" class="form-control" name="package_name" id="exampleInputservice" value="{{$package->package_name}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputservice" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" id="exampleInputservice" value="{{$package->description}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputservice" class="form-label">Price</label>
        <input type="text" class="form-control" name="package_price" id="exampleInputservice" value="{{$package->package_price}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection