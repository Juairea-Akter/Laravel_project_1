
<?php $__env->startSection('content'); ?>
<h2 class="mb-4">Customer feedbacks</h2>
<table class="table dataTable">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Phone</th>
            <th scope="col">Package Name</th>
            <th scope="col">Rating</th>
            <th scope="col">Feedback</th>
            <th scope="col">Created Date</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($feedback->sub_order->makeup_artist_id == auth()->user()->id): ?>
                <tr>
                    <td scope="row"><?php echo e($key+1); ?></td>
                    <td scope="row"><?php echo e($feedback->user->name); ?></td>
                    <td scope="row"><?php echo e($feedback->user->phone); ?></td>
                    <td scope="row"><?php echo e($feedback->sub_order->package->package_name); ?></td>
                    <td scope="row"><?php echo e($feedback->rating); ?></td>
                    <td scope="row"><?php echo e($feedback->feedback); ?></td>
                    <td scope="row"><?php echo e($feedback->created_at); ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
</table>

<script>
    $('.dataTable').DataTable();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.makeup_artist.makeup_artist_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/makeup_artist/makeup_artist_layout/makeup_artist_customer_feedback_list.blade.php ENDPATH**/ ?>