@extends('frontend.master')
@section('content')
@include('frontend.include.navbar')
    <div class="container-fluid">
        <table border="0" cellspacing="5" cellpadding="5" class="my-4">
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
                    <th scope="col">Order Date</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Package Name</th>
                    <th scope="col">Date and Time</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Transaction Number</th>
                    <th scope="col">Transaction Amount</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
        
                @foreach( $payments as $key => $payment)
                <tr>
        
                    <td>{{$payment->created_at}}</td>
                    <td>{{$payment->invoiceId}}</td>
                    <td>{{$payment->package->package_name}}</td>
                    <td>
                        <b>Date:</b> {{$payment->order->sub_order->date}} <br>
                        <b>Time:</b> {{$payment->order->sub_order->time}} <br>
                    </td>
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->transaction_number}}</td>
                    <td>{{$payment->transaction_amount}}</td>
                    <td>
                        @if($payment->status == 2)
                    <span>Confirm</span>
                    @elseif($payment->status == 1)
                    <span>Pending</span>
                    @endif
                    </td>
                    <td>
                        @if ($payment->order->sub_order->status == 1)
                            <span>In progress</span>
                            
                        @elseif ($payment->order->sub_order->status == 2)
                            <span>Complete</span>
                            <a href="{{
                                route("customer_feedback_form", $payment->order->id)
                            }}">Review</a>
                        @endif
                    </td>
                    <td>
                        <a href={{
                            route("generate_invoice",[$payment->id,"Customer copy"])
                          }} class="btn btn-primary">Print</a>
                    </td>
                </tr>
                @endforeach
        
            </tbody>
        </table>
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
        
        
        var table = $('.paymentListDataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    title: function(){
                        const dateTime = minDate.val() && maxDate.val() ? `From ${minDate.val().toDateString()} - ${maxDate.val().toDateString()}` : minDate.val() ? `From ${minDate.val().toDateString()}` : maxDate.val() ? `- ${maxDate.val().toDateString()}` : '';
                        var printTitle = `Customer Payment List ${dateTime}`;
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