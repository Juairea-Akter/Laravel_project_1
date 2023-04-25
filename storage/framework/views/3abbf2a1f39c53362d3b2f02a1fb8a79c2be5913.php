
<?php $__env->startSection('content'); ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Serial</th>
      <th scope="col">User Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone number</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Package name</th>
      <th scope="col">Package Description</th>
      <th scope="col">Qunatity</th>
      <th scope="col">Price</th>
      <th scope="col">Total Price + VAT</th>

    </tr>
  </thead>
  <tbody>

    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $sub_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $sub_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($order->id == $sub_order->order_id): ?>
    <tr>
      <td><?php echo e($order->created_at); ?></td>
      <td><?php echo e($key1+1); ?></td>
      <td><?php echo e($order ->user->name); ?></td>
      <td><?php echo e($order ->address); ?></td>
      <td><?php echo e($order->phone); ?></td>
      <td><?php echo e($sub_order->package->makeupartist->name); ?></td>
      <td><?php echo e($sub_order->package->package_name); ?></td>
      <td><?php echo e($sub_order->package->description); ?></td>
      <td><?php echo e($sub_order->quantity); ?></td>
      <td><?php echo e($sub_order->price); ?></td>
      <td><?php echo e($sub_order->sub_total); ?></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>

</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/layout/orders/order.blade.php ENDPATH**/ ?>