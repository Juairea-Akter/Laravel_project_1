
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid">
        <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="packages-tab" data-bs-toggle="tab" data-bs-target="#packages" type="button" role="tab" aria-controls="packages" aria-selected="true">Packages</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
            </li>
            
          </ul>
        <table border="0" cellspacing="5" cellpadding="5" class="my-4">
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
                    <table class="table paymentListDataTable">
                        <thead>
                            <tr>
                                <th scope="col">Order Date</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Package Name</th>
                                <th scope="col">Date and Time</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Transaction Number</th>
                                <th scope="col">Transaction Amount</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($payment->order->type == 'package'): ?>

                                <tr>
                        
                                    <td><?php echo e($payment->created_at); ?></td>
                                    <td><?php echo e($payment->invoiceId); ?></td>
                                    <td><?php echo e($payment->package->package_name); ?></td>
                                    <td>
                                        <b>Date:</b> <?php echo e($payment->order->sub_order->date); ?> <br>
                                        <b>Time:</b> <?php echo e($payment->order->sub_order->time); ?> <br>
                                    </td>
                                    <td><?php echo e($payment->name); ?></td>
                                    <td><?php echo e($payment->transaction_number); ?></td>
                                    <td><?php echo e($payment->transaction_amount); ?></td>
                                    <td>
                                        <?php if($payment->status == 2): ?>
                                    <span>Confirm</span>
                                    <?php elseif($payment->status == 1): ?>
                                    <span>Pending</span>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($payment->order->status == 1): ?>
                                            <span>In progress</span>
                                            
                                        <?php elseif($payment->order->status == 2): ?>
                                            <span>Complete</span>
                                            <a href="<?php echo e(route("customer_feedback_form", $payment->order->id)); ?>" class="d-block">Review</a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href=<?php echo e(route("generate_invoice",[$payment->id,"Customer copy"])); ?> class="btn btn-primary">Print</a>
                                    </td>
                                </tr>
                                
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                <div class="py-5">
            
                  <table class="table paymentListDataTable">
                    <thead>
                      <tr>
                        <th scope="col">Order Date</th>
                        <th scope="col">Service description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Transaction Number</th>
                        <th scope="col">Transaction Amount</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                
                      <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($payment->order->type == 'service'): ?>
                        <tr>
                            <td><?php echo e($payment->created_at); ?></td>
                            <td><?php echo e($payment->order->service_description); ?></td>
                          <td><?php echo e($payment->date); ?></td>
                          <td><?php echo e($payment->order ->user->name); ?></td>
                          <td><?php echo e($payment->transaction_number); ?></td>
                          <td><?php echo e($payment->transaction_amount); ?></td>
                          <td>
                            <?php if($payment->status == 2): ?>
                                <span>Confirm</span>
                                <?php elseif($payment->status == 1): ?>
                                <span>Pending</span>
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
        
        
        var table = $('.paymentListDataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    className : "btn btn-primary",
                    title: function(){
                        const dateTime = minDate.val() && maxDate.val() ? `From ${minDate.val().toDateString()} - ${maxDate.val().toDateString()}` : minDate.val() ? `From ${minDate.val().toDateString()}` : maxDate.val() ? `- ${maxDate.val().toDateString()}` : '';
                        var printTitle = `Customer Payment List ${dateTime}`;
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
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/layouts/payment_details.blade.php ENDPATH**/ ?>