
<?php $__env->startSection('content'); ?>
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
            <th scope="col">Action</th>
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
                <form action="<?php echo e(route('payment_list_update',$payment->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <button type="submit" class="btn btn-primary">Confirm</button>
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
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/layout/payment/payment_list.blade.php ENDPATH**/ ?>