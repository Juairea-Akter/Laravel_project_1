@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')

<table class="table">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Package Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $key = 0;
    @endphp
    @foreach($carts as $data)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->qty}}</td>
      <td>{{$data->price}}</td>
      <td>{{$data->subtotal}}</td>
      <td><a href="{{route('destroy',$data->rowId)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @php
    $key++;
    @endphp
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4" class="text-end">Grand total = </td>
      <td colspan="2">{{Cart::subtotal()}}</td>

    </tr>
    <td colspan="4" class="text-end">Total with tax(21%) = </td>
    <td colspan="2">{{Cart::total()}}</td>

    </tr>
  </tfoot>
</table>
<div class="text-center my-5">
  <a href="{{route('cart_checkout')}}" class="btn btn-primary">Check out</a>
</div>
@endsection