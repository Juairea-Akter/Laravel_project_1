
<?php $__env->startSection('content'); ?>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"> -->
<div class="py-5">
    <table class="table" id="paymentList">
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

            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                <td><?php echo e($payment->created_at); ?></td>
                <td><?php echo e($payment->invoiceId); ?></td>
                <td><?php echo e($payment->package->package_name); ?></td>
                <td><?php echo e($payment->name); ?></td>
                <td><?php echo e($payment->email); ?></td>
                <td><?php echo e($payment->phone); ?></td>
                <td><?php echo e($payment->artist->name); ?></td>
                <td><?php echo e($payment->artist->phone); ?></td>
                <td><?php echo e($payment->transaction_number); ?></td>
                <td><?php echo e($payment->transaction_amount); ?></td>
                <td>
                    <form action="<?php echo e(route('payment_list_update',$payment->id)); ?>" method="post" class="d-flex">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        <a href="/generate-invoice/<?php echo e($payment->id); ?>" class="btn btn-success">Print</button>
                    </form>

                </td>

                <?php if($payment->status == 2): ?>
                <td>Confirmed</td>
                <?php elseif($payment->status == 1): ?>
                <td>Pending</td>
                <?php endif; ?>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__env->stopSection(); ?>
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


<script>
    $(document).ready(function() {
        $('#paymentList').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script> -->
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/backend/layout/payment/payment_list.blade.php ENDPATH**/ ?>