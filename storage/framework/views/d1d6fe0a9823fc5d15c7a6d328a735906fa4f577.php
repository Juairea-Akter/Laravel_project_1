
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Product Name</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Transaction Number</th>
            <th scope="col">Transaction Amount</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>

        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($payment->package->package_name); ?></td>
            <td><?php echo e($payment->name); ?></td>
            <td><?php echo e($payment->address); ?></td>
            <td><?php echo e($payment->email); ?></td>
            <td><?php echo e($payment->phone); ?></td>
            <td><?php echo e($payment->transaction_number); ?></td>
            <td><?php echo e($payment->transaction_amount); ?></td>
            <td>
                <?php if($payment->status == 2): ?>
            <td>Confirm</td>
            <?php elseif($payment->status == 1): ?>
            <td>Pending</td>
            <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/layouts/payment_details.blade.php ENDPATH**/ ?>