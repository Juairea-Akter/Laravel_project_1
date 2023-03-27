
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('makeup_artist_co_artist_list_update',$co_artist->id)); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Co-Artist Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputDescription" value="<?php echo e($co_artist->name); ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputDescription" value="<?php echo e($co_artist->email); ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Phone</label>
    <input type="tel" class="form-control" name="phone" id="exampleInputDescription" value="<?php echo e($co_artist->phone); ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Image</label>
    <input type="file" class="form-control" name="image" id="exampleInputDescription" value="<?php echo e($co_artist->image); ?>">
  </div>
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.makeup_artist.makeup_artist_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/makeup_artist/makeup_artist_layout/makeup_artist_co_artist/makeup_artist_co_artist_edit.blade.php ENDPATH**/ ?>