
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('cat_update',$category->id)); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-3">
        <label for="exampleInputCategoryName" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputCategoryName" placeholder="Enter your name" value="<?php echo e($category->name); ?>">


    </div>
    <div class="mb-3">
        <label for="exampleInputDescription" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" id="exampleInputDescription" placeholder="Enter address" value="<?php echo e($category->description); ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputDescription" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="exampleInputDescription">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/layout/category/edit.blade.php ENDPATH**/ ?>