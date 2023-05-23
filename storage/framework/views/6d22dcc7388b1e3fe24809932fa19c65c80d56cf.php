
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="course" id="serviceSection">

    <h1>Choose Your Makeup Category</h1>
    <p>Here you will find the best deal packages from top makeup artists</p>

    <div class="row justify-content-start">
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-4">
            <div class="card h-100">
                <img src="<?php echo e(asset('/uploads/profile/'.$service->image)); ?>" class="card-img-top" alt="<?php echo e($service->image); ?>" style="max-height: 300px;object-fit: cover; object-position: top;">
                <div class="card-body d-flex flex-column justify-content-between align-items-center">
                    <h5 class="card-title"><?php echo e($service->name); ?></h5>
                    <p class="card-text"><?php echo e($service->description); ?></p>
                    <a href="<?php echo e(route('view_details',$service->id)); ?>" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    
    <div class="my-5 border p-4 rounded">
        <h2>Searching for specific services?</h2>
        <p>Select what you need here</p>

        <a href="<?php echo e(route('custom_package_create_form')); ?>" class="btn btn-primary btn-lg">Select</a>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/layouts/index.blade.php ENDPATH**/ ?>