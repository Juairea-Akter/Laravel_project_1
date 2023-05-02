
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="course">
    <h1>Choose Your Makeup Artist</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    <div class="row justify-content-start">
        <?php $__currentLoopData = $packs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($pack->makeup_artist_id == $user->id): ?>
        <div class="col-4">
            <div class="card">
                <img src="<?php echo e(asset('/uploads/profile/'.$user->image)); ?>" class="card-img-top" alt="<?php echo e($user->image); ?>" style="max-height: 300px;object-fit: cover; object-position: top;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($user->name); ?></h5>
                    <p class="card-text"><?php echo e($user->description); ?></p>
                    <a href="<?php echo e(route('view_more',$user->id)); ?>" class="btn btn-primary">View more</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/layouts/service/artist_choose.blade.php ENDPATH**/ ?>