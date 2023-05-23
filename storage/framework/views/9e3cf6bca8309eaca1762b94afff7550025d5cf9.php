
<?php $__env->startSection('content'); ?>
<h2>Appointmemnt List</h2>
<ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="packages-tab" data-bs-toggle="tab" data-bs-target="#packages" type="button" role="tab" aria-controls="packages" aria-selected="true">Packages</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
  </li>
  
</ul>

<table border="0" cellspacing="5" cellpadding="5">
    <tbody>
        <tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody>
</table>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="packages" role="tabpanel" aria-labelledby="packages-tab">
    <div class="py-4">
      <table class="table appointmentListDataTable">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Serial</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Address</th>
            <th scope="col">Customer Phone</th>
            <th scope="col">Packages Name</th>
            <th scope="col">Time</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Order Status</th>
            <th scope="col">Order Action</th>
            <th scope="col">Payment Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $sub_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $sub_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($sub_order->date); ?></td>
              <td scope="row"><?php echo e($key1+1); ?></td>
              <td><?php echo e($sub_order->customer->name ?? "No Name"); ?></td>
              <td><?php echo e($sub_order->customer->address ?? "No Email"); ?></td>
              <td><?php echo e($sub_order->customer->phone ?? "No Phone"); ?></td>
              <td><?php echo e($sub_order->package->package_name); ?></td>
              <td><?php echo e($sub_order->time); ?></td>
              <td>
                <?php if($sub_order->payment->status == 1): ?>
                <span>Pending</span>
                <?php elseif($sub_order->payment->status == 2): ?>
                <span>Confirmed</span>
                <?php endif; ?>
              </td>
              <td>
                <?php if($sub_order->order->status == 1): ?>
                    <span>In progress</span>
                    
                <?php elseif($sub_order->order->status == 2): ?>
                    <span>Completed</span>
                <?php endif; ?>
              </td>
              <td>
                <?php if($sub_order->order->status == 1): ?>
                  <a href="<?php echo e(route('makeup_artist_appointment_order_action', [$sub_order->order->id,2])); ?>" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                    
                <?php else: ?>
                <a href="<?php echo e(route('makeup_artist_appointment_order_action', [$sub_order->order->id,1])); ?>" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a>
                <?php endif; ?>
              </td>
              <td>
                <a href=<?php echo e(route("generate_invoice",[$sub_order->payment->id,"Artist copy"])); ?> class="btn btn-primary">Print</a>
            </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    
    </div>

  </div>
  <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
    <div class="py-5">

      <table class="table appointmentListDataTable">
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
            <th scope="col">Payment Status</th>
            <th scope="col">Order Status</th>
            <th scope="col">Order Action</th>
            <th scope="col">Payment Action</th>
          </tr>
        </thead>
        <tbody>
    
          <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($payment->order->type == 'service'): ?>
            <tr>
              <td><?php echo e($payment->date); ?></td>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($payment->order ->user->name); ?></td>
              <td><?php echo e($payment->order ->address); ?></td>
              <td><?php echo e($payment->order->phone); ?></td>
              <td><?php echo e($payment->order->payment->artist->name); ?></td>
              <td><?php echo e($payment->order->service_description); ?></td>
              <td><?php echo e($payment->order->total); ?></td>
              <td>
                <?php if($payment->status == 1): ?>
                <span>Pending</span>
                <?php elseif($payment->status == 2): ?>
                <span>Confirmed</span>
                <?php endif; ?>
              </td>
              <td>
                <?php if($payment->order->status == 1): ?>
                    <span>In progress</span>
                    
                <?php elseif($payment->order->status == 2): ?>
                    <span>Completed</span>
                <?php endif; ?>
              </td>
              <td>
                <?php if($payment->order->status == 1): ?>
                  <a href="<?php echo e(route('makeup_artist_appointment_order_action', [$payment->order->id,2])); ?>" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                    
                <?php else: ?>
                <a href="<?php echo e(route('makeup_artist_appointment_order_action', [$payment->order->id,1])); ?>" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a>
                <?php endif; ?>
              </td>
              <td>
                <a href=<?php echo e(route("generate_invoice",[$payment->id,"Artist copy"])); ?> class="btn btn-primary">Print</a>
            </td>
            </tr>
            
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    
      </table>
    </div>
  </div>
  
</div>
  <script>
    $(document).ready(function() {
        var minDate, maxDate;
        
        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[0] );
                
                // console.table([min, max, date])
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );

        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });
        var table = $('.appointmentListDataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'print',
                className: 'btn btn-primary',
                title: function(){
                  const dateTime = minDate.val() && maxDate.val() ? `From ${minDate.val().toDateString()} - ${maxDate.val().toDateString()}` : minDate.val() ? `From ${minDate.val().toDateString()}` : maxDate.val() ? `- ${maxDate.val().toDateString()}` : '';
                    var printTitle = `Appointment List ${dateTime}`;
                    return printTitle
                }
              }
            ]
        });

        // Refilter the table
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.makeup_artist.makeup_artist_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/makeup_artist/makeup_artist_layout/makeup_artist_appointment_list.blade.php ENDPATH**/ ?>