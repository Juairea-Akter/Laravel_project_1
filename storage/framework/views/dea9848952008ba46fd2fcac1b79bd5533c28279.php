
<?php $__env->startSection('content'); ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Package Name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Sub Category Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $packages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($packages ->package_name); ?></td>
            <td><?php echo e($packages ->category->name); ?></td>
            <td><?php echo e($packages->sub_category->name); ?></td>
            <td><?php echo e($packages ->description); ?></td>
            <td><?php echo e($packages ->package_price); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/layout/service/service_list.blade.php ENDPATH**/ ?>