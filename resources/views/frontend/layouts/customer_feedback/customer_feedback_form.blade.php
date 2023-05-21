@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')
<div class="container my-5">
    <h3 class="text-center">Please give us your feedback</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
            <p class="mx-0 px-0">Your feedback is very important to us.</p>
        </div>
    @endif
    <form action="{{
        route('customer_feedback_create', $order_id)
    }}" method="post">
    @csrf
        <div class="form-group mb-4">
            <label for="forRating">Rating</label>
            <select class="custom-select" id="forRating" name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
        </div>
        <div class="form-group mb-4">
            <label for="forreview">Review</label>
            <textarea class="form-control" id="forreview" rows="5" name="feedback"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection