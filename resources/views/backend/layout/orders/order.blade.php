@extends('backend.master')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Serial</th>
      <th scope="col">User Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone number</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Package name</th>
      <th scope="col">Package Description</th>
      <th scope="col">Qunatity</th>
      <th scope="col">Price</th>
      <th scope="col">Total Price + VAT</th>

    </tr>
  </thead>
  <tbody>

    @foreach( $orders as $key => $order)
    @foreach( $sub_orders as $key1 => $sub_order)
    @if($order->id == $sub_order->order_id)
    <tr>
      <td>{{$order->created_at}}</td>
      <td>{{$key1+1}}</td>
      <td>{{$order ->user->name}}</td>
      <td>{{$order ->address}}</td>
      <td>{{$order->phone}}</td>
      <td>{{$sub_order->package->makeupartist->name}}</td>
      <td>{{$sub_order->package->package_name}}</td>
      <td>{{$sub_order->package->description}}</td>
      <td>{{$sub_order->quantity}}</td>
      <td>{{$sub_order->price}}</td>
      <td>{{$sub_order->sub_total}}</td>
    </tr>
    @endif
    @endforeach
    @endforeach
  </tbody>

</table>
@endsection