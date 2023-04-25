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

    </tr>
    @php
    $key++;
    @endphp
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">Grand total</td>
      <td>{{Cart::subtotal()}}</td>

    </tr>
    <td colspan="4">Total with tax(21%)</td>
    <td>{{Cart::total()}}</td>

    </tr>
  </tfoot>
</table>


<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }

    
  </style>
</head>

<body>
@foreach($carts as $data)



  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="{{route('submit',[$data->id,$data->subtotal,$data->qty])}} "method="post">
@csrf
          <div class="row">
            <div class="col-50">
              <h3>Cart Details</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" name="name" id="name" value="{{auth()->user()->name}}">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" name="email" id="email" value="{{auth()->user()->email}}">

              <label for="phone"><i class="fa fa-envelope"></i> Phone</label>
              <input type="tel" name="phone" id="phone" value="{{auth()->user()->phone}}">

              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" type="text" name="address" id="address" value="{{auth()->user()->address}}">
            </div>

            <div class="form-group">
              <label for="date">Select Date:</label>
              <input type="date" id="datepicker" name="date" class="form-control" required>
            </div>
            <div class="mb-3">
                        <label for="exampleInputCategoryName" class="form-label">Time Slot</label>
                        <select name="time" id="exampleInputDescription" class="form-control">
                            <option value="">Choose Time Slot</option>
                           
                            <option value="1">9-12</option>
                            <option value="2">12-3</option>
                            <option value="3">6-9</option>
                          
                        </select>
                    </div>
            
          </div>

          <input type="submit" value="Submit">

        </form>
      </div>
    </div>

    <!-- <div class="col-25">
      <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
        <p>Product 1 (2 x) <span class="price">$15</span></p>
        <p>Product 2 (2 x) <span class="price">$5</span></p>
        <p>Product 3 (2 x) <span class="price">$8</span></p>
        <p>Product 4 (2 x) <span class="price">$2</span></p>
        <hr>
        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
      </div>
    </div> -->
  </div>
  @endforeach

</body>

</html>

@endsection