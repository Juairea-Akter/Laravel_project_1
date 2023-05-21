
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('makeup_artist_service_update',$package->id)); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-3">
        <label for="exampleInputCategoryName" class="form-label">Category Name</label>
        <select name="cat_id" id="exampleInputDescription" class="form-control">
            <option value="">Choose...</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php if($package->cat_id == $category->id): ?>selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputCategoryName" class="form-label">Sub Category Name</label>
        <select name="sub_cat_id" id="exampleInputDescription" class="form-control">
            <option>Choose...</option>
            <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php if($package->sub_cat_id == $sub_category->id): ?>selected <?php endif; ?> value="<?php echo e($sub_category->id); ?>"><?php echo e($sub_category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputservice" class="form-label">Package name</label>
        <input type="text" class="form-control" name="package_name" id="exampleInputservice" value="<?php echo e($package->package_name); ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputservice" class="form-label">Description</label>
        <textarea type="text" class="form-control" name="description" id="exampleInputservice" cols="30" rows="10"><?php echo e($package->description); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputservice" class="form-label">Price</label>
        <input type="text" class="form-control" name="package_price" id="exampleInputservice" value="<?php echo e($package->package_price); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.makeup_artist.makeup_artist_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/makeup_artist/makeup_artist_layout/makeup_artist_service/makeup_artist_service_edit.blade.php ENDPATH**/ ?>