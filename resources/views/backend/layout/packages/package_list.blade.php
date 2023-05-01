@extends('backend.master')
@section('content')
<div class="py-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Package Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Sub Category Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection