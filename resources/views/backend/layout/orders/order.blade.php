@extends('backend.master')
@section('content')
<div class="py-5">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="packages-tab" data-bs-toggle="tab" data-bs-target="#packages" type="button" role="tab" aria-controls="packages" aria-selected="true">Packages</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="packages" role="tabpanel" aria-labelledby="packages-tab">
      <div class="py-5">

        <table class="table dataTable">
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
              <th scope="col">Total Price</th>
      
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
      </div>
    </div>
    <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
      <div class="py-5">

        <table class="table dataTable">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Serial</th>
              <th scope="col">User Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone number</th>
              <th scope="col">Artist Name</th>
              <th scope="col">Service description</th>
              <th scope="col">Total Price</th>
      
            </tr>
          </thead>
          <tbody>
      
            @foreach( $orders as $key => $order)
            @if ($order->type == 'service')
              <tr>
                <td>{{$order->created_at}}</td>
                <td>{{$key+1}}</td>
                <td>{{$order ->user->name}}</td>
                <td>{{$order ->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->payment->artist->name}}</td>
                <td>{{$order->service_description}}</td>
                <td>{{$order->total}}</td>
              </tr>
            @endif
            @endforeach
          </tbody>
      
        </table>
      </div>
    </div>
    
  </div>
  
</div>
<script>
  $('.dataTable').DataTable();
</script>
@endsection