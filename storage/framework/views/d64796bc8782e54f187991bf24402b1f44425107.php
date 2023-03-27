
<?php $__env->startSection('content'); ?>
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Image</th>
      <th scope="col">Account Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- <?php if($user->role_id == 2): ?> -->
    <tr>
      <th scope="row"><?php echo e($key+1); ?></th>
      <td><?php echo e($user->name); ?></td>
      <td><?php echo e($user->email); ?></td>
      <td><?php echo e($user->address); ?></td>
      <td><?php echo e($user->phone); ?></td>
      <td><?php if($user->image == null): ?>
        <img src="<?php echo e(asset('/uploads/profile/dummy.jpg')); ?>" height="50px" width="50px">
        <?php else: ?>
        <img src="<?php echo e(asset('/uploads/profile/'.$user->image)); ?>" height="50px" width="50px">
        <?php endif; ?>
      </td>
      <td>
        <?php if($user->status == "pending"): ?>
        <p class="badge bg-primary"><?php echo e($user->status); ?></p>
        <?php elseif($user->status == "deactive"): ?>
        <p class="badge bg-danger"><?php echo e($user->status); ?></p>
        <?php else: ?>
        <p class="badge bg-success"><?php echo e($user->status); ?></p>
        <?php endif; ?>

      </td>
      <td>
        <a class="btn btn" href="<?php echo e(route('makeupartist_list_edit',$user->id)); ?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
         <i class="fa-solid fa-trash"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you want to remove ?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <a type="button" class="btn btn-danger"href="<?php echo e(route('makeupartist_list_delete',$user->id)); ?>">Confirm</a>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">NO</button>
              </div>
            </div>
          </div>
      </td>
    </tr>
    <!-- <?php endif; ?> -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/layout/makeupartist/makeupartist_list.blade.php ENDPATH**/ ?>