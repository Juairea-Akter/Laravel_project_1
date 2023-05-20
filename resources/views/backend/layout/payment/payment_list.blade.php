@extends('backend.master')
@section('content')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"> -->
<div class="py-5">
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
    <table class="table paymentListDataTable">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Invoice</th>
                <th scope="col">Package Name</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Customer Email</th>
                <th scope="col">Customer Phone</th>
                <th scope="col">Artist Name</th>
                <th scope="col">Artist Phone</th>
                <th scope="col">Transaction Number</th>
                <th scope="col">Transaction Amount</th>
                <th scope="col">Action</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

            @foreach( $payments as $key => $payment)
            <tr>

                <td>{{$payment->created_at}}</td>
                <td>{{$payment->invoiceId}}</td>
                <td>{{$payment->package->package_name}}</td>
                <td>{{$payment->name}}</td>
                <td>{{$payment->email}}</td>
                <td>{{$payment->phone}}</td>
                <td>{{$payment->artist->name}}</td>
                <td>{{$payment->artist->phone}}</td>
                <td>{{$payment->transaction_number}}</td>
                <td>{{$payment->transaction_amount}}</td>
                <td>
                    <form action="{{route('payment_list_update',$payment->id)}}" method="post" class="d-flex">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        <a href="/generate-invoice/{{$payment->id}}" class="btn btn-success">Print</button>
                    </form>

                </td>

                @if($payment->status == 2)
                <td>Confirmed</td>
                @elseif($payment->status == 1)
                <td>Pending</td>
                @endif

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
-->

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
        
        
        var table = $('.paymentListDataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    title: function(){
                        const dateTime = minDate.val() && maxDate.val() ? `From ${minDate.val().toDateString()} - ${maxDate.val().toDateString()}` : minDate.val() ? `From ${minDate.val().toDateString()}` : maxDate.val() ? `- ${maxDate.val().toDateString()}` : '';
                        var printTitle = `Payment List ${dateTime}`;
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
