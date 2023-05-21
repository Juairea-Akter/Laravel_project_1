@extends('frontend.makeup_artist.makeup_artist_master')
@section('content')
<h2 class="mb-4">Customer feedbacks</h2>
<table class="table dataTable">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Phone</th>
            <th scope="col">Package Name</th>
            <th scope="col">Rating</th>
            <th scope="col">Feedback</th>
            <th scope="col">Created Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($feedbacks as $key => $feedback)
            @if ($feedback->sub_order->makeup_artist_id == auth()->user()->id)
                <tr>
                    <td scope="row">{{$key+1}}</td>
                    <td scope="row">{{$feedback->user->name}}</td>
                    <td scope="row">{{$feedback->user->phone}}</td>
                    <td scope="row">{{$feedback->sub_order->package->package_name}}</td>
                    <td scope="row">{{$feedback->rating}}</td>
                    <td scope="row">{{$feedback->feedback}}</td>
                    <td scope="row">{{$feedback->created_at}}</td>
                </tr>
            @endif
        @endforeach
      </tbody>
</table>

<script>
    $('.dataTable').DataTable();
</script>

@endsection