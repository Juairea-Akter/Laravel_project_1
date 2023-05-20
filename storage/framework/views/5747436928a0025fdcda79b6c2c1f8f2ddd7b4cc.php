
<?php $__env->startSection('content'); ?>
<div class="py-5">

    <table class="table dataTable">
        <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Name</th>
                <th scope="col">Makeup Artist Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $co_artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $co_artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($co_artist ->name); ?></td>
                <td><?php echo e($co_artist->artist->name); ?></td>
                <td><?php echo e($co_artist ->email); ?></td>
                <td><?php echo e($co_artist ->phone); ?></td>
                <td><?php if($co_artist->image == null): ?>
                    <img src="<?php echo e(asset('/uploads/profile/dummy.jpg')); ?>" height="50px" width="50px">
                    <?php else: ?>
                    <img src="<?php echo e(asset('/uploads/profile/'.$co_artist->image)); ?>" height="50px" width="50px">
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<script>
    $('.dataTable').DataTable();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/backend/layout/co_artist/co_artist_list.blade.php ENDPATH**/ ?>