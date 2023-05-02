
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="course">
    <h1>Available packages</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    <div class="row justify-content-start">
        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($package->package_name); ?></h5>
                    <p class="card-text"><?php echo e($package->description); ?></p>
                    <p><?php echo e($package->package_price); ?> TK</p>
                    <a href="<?php echo e(route('add_cart',$package->id)); ?>" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/layouts/service/view_more_about_artist.blade.php ENDPATH**/ ?>