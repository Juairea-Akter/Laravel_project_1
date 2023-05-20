@extends('backend.master')
@section('content')
<div class="py-5">

    <table class="table dataTable">
        <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Name</th>
                <th scope="col">Makeup Artist Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Image</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $('.dataTable').DataTable();
</script>
@endsection