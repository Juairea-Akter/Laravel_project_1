
<?php $__env->startSection('content'); ?>
<h2>Appointmemnt List</h2>
<div class="py-4">

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Customer Address</th>
        <th scope="col">Customer Phone</th>
        <th scope="col">Packages Name</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Payment status</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td scope="row"><?php echo e($key+1); ?></td>
        <td><?php echo e($order->customer->name ?? "No Name"); ?></td>
        <td><?php echo e($order->customer->address ?? "No Email"); ?></td>
        <td><?php echo e($order->customer->phone ?? "No Phone"); ?></td>
        <td><?php echo e($order->package->package_name); ?></td>
        <td><?php echo e($order->date); ?></td>
        <td><?php echo e($order->time); ?></td>
        <td>
          <?php if($order->payment->status == 1): ?>
          <span>Pending</span>
          <?php elseif($order->payment->status == 2): ?>
          <span>Confirmed</span>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.makeup_artist.makeup_artist_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/makeup_artist/makeup_artist_layout/makeup_artist_appointment_list.blade.php ENDPATH**/ ?>