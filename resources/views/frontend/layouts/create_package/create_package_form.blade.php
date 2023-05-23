@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')

<div class="container my-5 border rounded py-4">
    <h2 class="text-center">Select your specifics services</h2>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @else
        
    @endif
    <form action="{{route('service_order')}}" method="post">
      @csrf
      <div class="form-group mb-4">
        <label for="makeUpAstist" class="mb-1">Select makeup artist</label>
        <select class="form-control" id="makeUpAstist" name="artistId">
          <option>Select one</option>
          @foreach ($makeupArtists as $artist)
          <option value="{{$artist->id}}">{{$artist->name}}</option>
          @endforeach
        </select>
      </div>
      <label class="mb-1">Select service</label>
      @foreach ($services as $service)
        <div class="form-check">
          <input type="checkbox" name="service[]" class="form-check-input" id="{{$service->service_name}}" data-price="{{$service->service_price}}" value="{{$service->id}}">
          <label class="form-check-label" for="{{$service->service_name}}">{{$service->service_name}} - {{$service->service_price}} Tk</label>
        </div>
      @endforeach

      <div class="form-group my-4">
        <label for="date">Select date</label>
        <input type="date" class="form-control" id="date" name="date">
      </div>

      <input type="hidden" readonly class="text-dark border-0" name="subTotal" value="0" />
      <p class="text-dark p-0">Subtotal : <span id="subTotal">0</span> Tk</p>
      <input type="hidden" readonly class="text-dark border-0" name="tax" value="0" />
      <p class="text-dark p-0">Tax (10%) : <span id="tax">0</span> Tk</p>
      <input type="hidden" readonly class="text-dark border-0" name="total" value="0" />
      <p class="text-dark p-0">Total : <span id="total">0</span> Tk</p>
    

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Book and payment
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
              
            </div>
            <div class="modal-body">
              <img class="center" style="display: block;
                    margin-left: auto;
                    margin-right: auto;
                    height:150px; width:150px;
                    border: 2px solid black;
                    font-weight: bold;
        padding: 10px;" src="{{ asset('/images/bkash_qr.jpg')}}" />

            <div class="form-group my-4">
                <label for="transaction-number">Transaction Number:</label>
                <input type="text" id="transaction-number" name="transaction_number" required><br>

            </div>
            <div class="form-group my-4">
              <label for="transaction-amount">Transaction Amount:</label>
              <input type="text" id="transaction-amount" name="transaction_amount" required value=""><br>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>

<script>
  $(document).ready(function(){
    var subTotal = 0;
    var tax = 0;
    var total = 0;
    $('input[type="checkbox"]').click(function(){
      if($(this).prop("checked") == true){
        subTotal += parseInt($(this).attr('data-price'));
        tax = subTotal * 0.1;
        total = subTotal + tax;
        $('input[name="subTotal"]').val(subTotal);
        $('input[name="tax"]').val(tax);
        $('input[name="total"]').val(total);
        $('#subTotal').text(subTotal);
        $('#tax').text(tax);
        $('#total').text(total);
      }
      else if($(this).prop("checked") == false){
        subTotal -= parseInt($(this).attr('data-price'));
        tax = subTotal * 0.1;
        total = subTotal + tax;
        $('input[name="subTotal"]').val(subTotal);
        $('input[name="tax"]').val(tax);
        $('input[name="total"]').val(total);
        $('#subTotal').text(subTotal);
        $('#tax').text(tax);
        $('#total').text(total);
      }
    });
  });
</script>

@endsection