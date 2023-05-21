
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container my-5">
    <h3 class="text-center">Please give us your feedback</h3>
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success" role="alert">
            <strong><?php echo e($message); ?></strong>
            <p class="mx-0 px-0">Your feedback is very important to us.</p>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('customer_feedback_create', $sub_order_id)); ?>" method="post">
    <?php echo csrf_field(); ?>
        <div class="form-group mb-4">
            <label for="forRating">Rating</label>
            <select class="custom-select" id="forRating" name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
        </div>
        <div class="form-group mb-4">
            <label for="forreview">Review</label>
            <textarea class="form-control" id="forreview" rows="5" name="feedback"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/layouts/customer_feedback/customer_feedback_form.blade.php ENDPATH**/ ?>