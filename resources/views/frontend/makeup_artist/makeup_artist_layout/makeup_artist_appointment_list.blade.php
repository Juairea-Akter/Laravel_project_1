@extends('frontend.makeup_artist.makeup_artist_master')
@section('content')
<h2>Appointmemnt List</h2>
<ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="packages-tab" data-bs-toggle="tab" data-bs-target="#packages" type="button" role="tab" aria-controls="packages" aria-selected="true">Packages</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
  </li>
  
</ul>

<table border="0" cellspacing="5" cellpadding="5">
    <tbody>
        <tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody>
</table>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="packages" role="tabpanel" aria-labelledby="packages-tab">
    <div class="py-4">
      <table class="table appointmentListDataTable">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Serial</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Address</th>
            <th scope="col">Customer Phone</th>
            <th scope="col">Packages Name</th>
            <th scope="col">Time</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Order Status</th>
            <th scope="col">Order Action</th>
            <th scope="col">Payment Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $sub_orders as $key1 => $sub_order)
            <tr>
              <td>{{$sub_order->date}}</td>
              <td scope="row">{{$key1+1}}</td>
              <td>{{$sub_order->customer->name ?? "No Name"}}</td>
              <td>{{$sub_order->customer->address ?? "No Email"}}</td>
              <td>{{$sub_order->customer->phone ?? "No Phone"}}</td>
              <td>{{$sub_order->package->package_name}}</td>
              <td>{{$sub_order->time}}</td>
              <td>
                @if($sub_order->payment->status == 1)
                <span>Pending</span>
                @elseif($sub_order->payment->status == 2)
                <span>Confirmed</span>
                @endif
              </td>
              <td>
                @if ($sub_order->order->status == 1)
                    <span>In progress</span>
                    
                @elseif ($sub_order->order->status == 2)
                    <span>Completed</span>
                @endif
              </td>
              <td>
                @if ($sub_order->order->status == 1)
                  <a href="{{
                    route('makeup_artist_appointment_order_action', [$sub_order->order->id,2])
                  }}" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                    
                @else
                <a href="{{
                  route('makeup_artist_appointment_order_action', [$sub_order->order->id,1])
                }}" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a>
                @endif
              </td>
              <td>
                <a href={{
                  route("generate_invoice",[$sub_order->payment->id,"Artist copy"])
                }} class="btn btn-primary">Print</a>
            </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    
    </div>

  </div>
  <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
    <div class="py-5">

      <table class="table appointmentListDataTable">
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
            <th scope="col">Payment Status</th>
            <th scope="col">Order Status</th>
            <th scope="col">Order Action</th>
            <th scope="col">Payment Action</th>
          </tr>
        </thead>
        <tbody>
    
          @foreach( $payments as $key => $payment)
          @if ($payment->order->type == 'service')
            <tr>
              <td>{{$payment->date}}</td>
              <td>{{$key+1}}</td>
              <td>{{$payment->order ->user->name}}</td>
              <td>{{$payment->order ->address}}</td>
              <td>{{$payment->order->phone}}</td>
              <td>{{$payment->order->payment->artist->name}}</td>
              <td>{{$payment->order->service_description}}</td>
              <td>{{$payment->order->total}}</td>
              <td>
                @if($payment->status == 1)
                <span>Pending</span>
                @elseif($payment->status == 2)
                <span>Confirmed</span>
                @endif
              </td>
              <td>
                @if ($payment->order->status == 1)
                    <span>In progress</span>
                    
                @elseif ($payment->order->status == 2)
                    <span>Completed</span>
                @endif
              </td>
              <td>
                @if ($payment->order->status == 1)
                  <a href="{{
                    route('makeup_artist_appointment_order_action', [$payment->order->id,2])
                  }}" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                    
                @else
                <a href="{{
                  route('makeup_artist_appointment_order_action', [$payment->order->id,1])
                }}" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a>
                @endif
              </td>
              <td>
                <a href={{
                  route("generate_invoice",[$payment->id,"Artist copy"])
                }} class="btn btn-primary">Print</a>
            </td>
            </tr>
            
          @endif
          @endforeach
        </tbody>
    
      </table>
    </div>
  </div>
  
</div>
  <script>
    $(document).ready(function() {
        var minDate, maxDate;
        
        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[0] );
                
                // console.table([min, max, date])
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );

        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });
        var table = $('.appointmentListDataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'print',
                className: 'btn btn-primary',
                title: function(){
                  const dateTime = minDate.val() && maxDate.val() ? `From ${minDate.val().toDateString()} - ${maxDate.val().toDateString()}` : minDate.val() ? `From ${minDate.val().toDateString()}` : maxDate.val() ? `- ${maxDate.val().toDateString()}` : '';
                    var printTitle = `Appointment List ${dateTime}`;
                    return printTitle
                }
              }
            ]
        });

        // Refilter the table
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
</script>
@endsection