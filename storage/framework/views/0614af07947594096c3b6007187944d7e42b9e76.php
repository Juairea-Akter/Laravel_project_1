
<?php $__env->startSection('content'); ?>
<div class="py-5">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="packages-tab" data-bs-toggle="tab" data-bs-target="#packages" type="button" role="tab" aria-controls="packages" aria-selected="true">Packages</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="packages" role="tabpanel" aria-labelledby="packages-tab">
      <div class="py-5">

        <table class="table dataTable">
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
              <th scope="col">Total Price</th>
      
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
      </div>
    </div>
    <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
      <div class="py-5">

        <table class="table dataTable">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Serial</th>
              <th scope="col">User Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone number</th>
              <th scope="col">Artist Name</th>
              <th scope="col">Service description</th>
              <th scope="col">Total Price</th>
      
            </tr>
          </thead>
          <tbody>
      
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($order->type == 'service'): ?>
              <tr>
                <td><?php echo e($order->created_at); ?></td>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($order ->user->name); ?></td>
                <td><?php echo e($order ->address); ?></td>
                <td><?php echo e($order->phone); ?></td>
                <td><?php echo e($order->payment->artist->name); ?></td>
                <td><?php echo e($order->service_description); ?></td>
                <td><?php echo e($order->total); ?></td>
              </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
      
        </table>
      </div>
    </div>
    
  </div>
  
</div>
<script>
  $('.dataTable').DataTable();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/backend/layout/orders/order.blade.php ENDPATH**/ ?>