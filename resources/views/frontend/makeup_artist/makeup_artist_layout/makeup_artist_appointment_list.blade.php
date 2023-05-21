@extends('frontend.makeup_artist.makeup_artist_master')
@section('content')
<h2>Appointmemnt List</h2>
<div class="py-4">
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
  <table class="table appointmentListDataTable">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Customer Address</th>
        <th scope="col">Customer Phone</th>
        <th scope="col">Packages Name</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Order Status</th>
        <th scope="col">Order Action</th>
        <th scope="col">Payment Action</th>
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
        <td>
          @if ($order->status == 1)
              <span>In progress</span>
              
          @elseif ($order->status == 2)
              <span>Completed</span>
          @endif
        </td>
        <td>
          @if ($order->status == 1)
            <a href="{{
              route('makeup_artist_appointment_order_action', [$order->id,2])
            }}" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
              
          @else
          <a href="{{
            route('makeup_artist_appointment_order_action', [$order->id,1])
          }}" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a>
          @endif
        </td>
        <td>
          <a href={{
            route("generate_invoice",[$order->payment->id,"Artist copy"])
          }} class="btn btn-primary">Print</a>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <script>
    $(document).ready(function() {
        var minDate, maxDate;
        
        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[5] );
                
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
</div>
@endsection