
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('makeupartist_list_update', $user->id)); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputName">Name</label>
      <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="<?php echo e($user->name); ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email" value="<?php echo e($user->email); ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address" value="<?php echo e($user->address); ?>">
  </div>
  <div class="form-group">
    <label for="inputphone">Phone </label>
    <input type="tel" name="phone" class="form-control" id="inputphone" placeholder="Phone" value="<?php echo e($user->phone); ?>">
  </div>
  <br>
  <div class="form-group">
    <?php if($user -> image == null): ?>
    <img src="<?php echo e(asset('/uploads/profile/dummy.jpg')); ?>" height="50px" width="50px">
    <?php else: ?>
    <img src="<?php echo e(asset('/uploads/profile/'.$user->image)); ?>" height="50px" width="50px">
    <?php endif; ?>
    <label for="inputimage">Image</label>
    <input type="file" name="image" class="form-control" id="inputimage" placeholder="image">
  </div>
  <div class="input-group my-3">
    <label class="label">Status</label>
    <select name="status">
      <option disabled="disabled" selected="selected">Choose option</option>
      <option value="deactive">Deactive</option>
      <option value="approve">Approve</option>
      <option value="pending">Pending</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/layout/makeupartist/makeupartist_list_edit.blade.php ENDPATH**/ ?>