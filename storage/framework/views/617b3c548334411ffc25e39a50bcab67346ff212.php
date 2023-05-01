
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('customer_list_update', $user->id)); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" value="<?php echo e($user->name); ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="email" value="<?php echo e($user->email); ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address" value="<?php echo e($user->address); ?>">
  </div>
  <div class="form-group">
    <label for="inputphone">Phone </label>
    <input type="tel" class="form-control" name="phone" id="inputphone" placeholder="Phone" value="<?php echo e($user->phone); ?>">
  </div>
  <br>
  <!-- <div class="form-group">
    <?php if($user -> image == null): ?>
    <img src="<?php echo e(asset('/uploads/profile/dummy.jpg')); ?>" height="50px" width="50px">
    <?php else: ?>
    <img src="<?php echo e(asset('/uploads/profile/'.$user->image)); ?>" height="50px" width="50px">
    <?php endif; ?>
    <label for="inputimage">Image</label>
    <input type="file" name="image" class="form-control" id="inputimage" placeholder="image">
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/layout/customer/customer_list_edit.blade.php ENDPATH**/ ?>