@extends('frontend.makeup_artist.makeup_artist_master')
@section('content')
<h2>Appointmemnt List</h2>
<div class="py-4">

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Customer Address</th>
        <th scope="col">Customer Phone</th>
        <th scope="col">Packages Name</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Payment status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $key => $order)
      <tr>
        <td scope="row">{{$key+1}}</td>
        <td>{{$order->customer->name ?? "No Name"}}</td>
        <td>{{$order->customer->address ?? "No Email"}}</td>
        <td>{{$order->customer->phone ?? "No Phone"}}</td>
        <td>{{$order->package->package_name}}</td>
        <td>{{$order->date}}</td>
        <td>{{$order->time}}</td>
        <td>
          @if($order->payment->status == 1)
          <span>Pending</span>
          @elseif($order->payment->status == 2)
          <span>Confirmed</span>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection