
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="course">
    <h1>Choose Your Makeup sub Category</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    <div class="row justify-content-start">
        <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-4">
            <div class="card mb-4">
                <img src="<?php echo e(asset('/uploads/profile/'.$sub_category->image)); ?>" class="card-img-top" alt="<?php echo e($sub_category->image); ?>" style="max-height: 300px;object-fit: cover; object-position: top;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($sub_category->name); ?></h5>
                    <p class="card-text"><?php echo e($sub_category->description); ?></p>
                    <a href="<?php echo e(route('choose_artist',$sub_category->id)); ?>" class="btn btn-primary">Choose Artist</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/layouts/service/viewdetails.blade.php ENDPATH**/ ?>