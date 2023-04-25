<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>

  
  </html>
  
  <body>
    <form action="{{route('payment_submit',$pak2)}}" method="post">
        @csrf
        <fieldset>
        
            <legend>Payment Information</legend>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="{{auth()->user()->name}}"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="{{auth()->user()->email}}"><br>

            <label for="transaction-number" style="text-align: center;">QR Bar Code</label>
            <img class="center" style="display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 50%; height:150px; width:150px;
                    border: 2px solid black;
                    font-weight: bold;
        padding: 10px;" src="{{ asset('/uploads/payment/bkash.jpg')}}" /><br>

            <label for="transaction-number">Transaction Number:</label>
            <input type="text" id="transaction-number" name="transaction_number" required><br>

            <label for="transaction-amount">Transaction Amount:</label>
            <input type="text" id="transaction-amount" name="transaction_amount" required value=""><br>

            @php
            $today = \Carbon\Carbon::now();
            $formattedDate = $today->format('Y-m-d');
            @endphp
            <label for="date">Date:</label>
            <input type="date" id="text" name="date" required value="{{$formattedDate}}"><br>



            <label for="city">City:</label>
            <input type="text" id="address" name="address" required required value="{{auth()->user()->address}}"><br>

            <label for="phone-number">Phone Number:</label>
            <input type="tel" id="phone-number" name="phone" required value="{{auth()->user()->phone}}"><br>

            <input type="submit" value="Submit Payment">
            <a class="btn btn-danger" href="{{route('sub_order_delete',$value)}}" role="button">Cancel</a>
        </fieldset>
    </form>
</body>

</html>