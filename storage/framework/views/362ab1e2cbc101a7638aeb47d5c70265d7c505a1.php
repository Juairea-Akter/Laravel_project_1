
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="course" id="serviceSection">

    <h1>Choose Your Makeup Category</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>

    <div class="row">
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="course-col">
            <h3><?php echo e($service->name); ?></h3>
            <p><?php echo e($service->description); ?></p>
            <a href="<?php echo e(route('view_details',$service->id)); ?>" class="btn btn-primary">View Details</a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/layouts/index.blade.php ENDPATH**/ ?>