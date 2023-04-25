@extends('backend.master')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Product Name</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Transaction Number</th>
            <th scope="col">Transaction Amount</th>
            <th scope="col">Action</th>
            <th scope="col">Status</th>

        </tr>
    </thead>
    <tbody>

        @foreach( $payments as $key => $payment)
        <tr>

            <td>{{$key+1}}</td>
            <td>{{$payment->package->package_name}}</td>
            <td>{{$payment->name}}</td>
            <td>{{$payment->address}}</td>
            <td>{{$payment->email}}</td>
            <td>{{$payment->phone}}</td>
            <td>{{$payment->transaction_number}}</td>
            <td>{{$payment->transaction_amount}}</td>
            <td>
                <form action="{{route('payment_list_update',$payment->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>

            </td>

            @if($payment->status == 2)
            <td>Confirmed</td>
            @elseif($payment->status == 1)
            <td>Pending</td>
            @endif

        </tr>
        @endforeach
        @endsection