
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Package Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $key = 0;
    ?>
    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($key+1); ?></th>
      <td><?php echo e($data->name); ?></td>
      <td><?php echo e($data->qty); ?></td>
      <td><?php echo e($data->price); ?></td>
      <td><?php echo e($data->subtotal); ?> Tk</td>
      <td><a href="<?php echo e(route('destroy',$data->rowId)); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    <?php
    $key++;
    ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4" class="text-end">Subtotal </td>
      <td colspan="2"><?php echo e(Cart::subtotal()); ?> Tk</td>

    </tr>
    <tr>
      <td colspan="4" class="text-end">Tax (10%)</td>
      <td colspan="2"><?php echo e(Cart::tax()); ?> Tk</td>

    </tr>
    <tr>
      <td colspan="4" class="text-end">Total </td>
      <td colspan="2"><?php echo e(Cart::total()); ?> Tk</td>
    </tr>
  </tfoot>
</table>
<div class="text-center my-5">
  <a href="<?php echo e(route('cart_checkout')); ?>" class="btn btn-primary">Check out</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/layouts/service/cart/cart_list.blade.php ENDPATH**/ ?>