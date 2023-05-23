
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container my-5 border rounded py-4">
    <h2 class="text-center">Select your specifics services</h2>
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php else: ?>
        
    <?php endif; ?>
    <form action="<?php echo e(route('service_order')); ?>" method="post">
      <?php echo csrf_field(); ?>
      <div class="form-group mb-4">
        <label for="makeUpAstist" class="mb-1">Select makeup artist</label>
        <select class="form-control" id="makeUpAstist" name="artistId">
          <option>Select one</option>
          <?php $__currentLoopData = $makeupArtists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($artist->id); ?>"><?php echo e($artist->name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <label class="mb-1">Select service</label>
      <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-check">
          <input type="checkbox" name="service[]" class="form-check-input" id="<?php echo e($service->service_name); ?>" data-price="<?php echo e($service->service_price); ?>" value="<?php echo e($service->id); ?>">
          <label class="form-check-label" for="<?php echo e($service->service_name); ?>"><?php echo e($service->service_name); ?> - <?php echo e($service->service_price); ?> Tk</label>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <div class="form-group my-4">
        <label for="date">Select date</label>
        <input type="date" class="form-control" id="date" name="date">
      </div>

      <input type="hidden" readonly class="text-dark border-0" name="subTotal" value="0" />
      <p class="text-dark p-0">Subtotal : <span id="subTotal">0</span> Tk</p>
      <input type="hidden" readonly class="text-dark border-0" name="tax" value="0" />
      <p class="text-dark p-0">Tax (10%) : <span id="tax">0</span> Tk</p>
      <input type="hidden" readonly class="text-dark border-0" name="total" value="0" />
      <p class="text-dark p-0">Total : <span id="total">0</span> Tk</p>
    

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Book and payment
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
              
            </div>
            <div class="modal-body">
              <img class="center" style="display: block;
                    margin-left: auto;
                    margin-right: auto;
                    height:150px; width:150px;
                    border: 2px solid black;
                    font-weight: bold;
        padding: 10px;" src="<?php echo e(asset('/images/bkash_qr.jpg')); ?>" />

            <div class="form-group my-4">
                <label for="transaction-number">Transaction Number:</label>
                <input type="text" id="transaction-number" name="transaction_number" required><br>

            </div>
            <div class="form-group my-4">
              <label for="transaction-amount">Transaction Amount:</label>
              <input type="text" id="transaction-amount" name="transaction_amount" required value=""><br>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>

<script>
  $(document).ready(function(){
    var subTotal = 0;
    var tax = 0;
    var total = 0;
    $('input[type="checkbox"]').click(function(){
      if($(this).prop("checked") == true){
        subTotal += parseInt($(this).attr('data-price'));
        tax = subTotal * 0.1;
        total = subTotal + tax;
        $('input[name="subTotal"]').val(subTotal);
        $('input[name="tax"]').val(tax);
        $('input[name="total"]').val(total);
        $('#subTotal').text(subTotal);
        $('#tax').text(tax);
        $('#total').text(total);
      }
      else if($(this).prop("checked") == false){
        subTotal -= parseInt($(this).attr('data-price'));
        tax = subTotal * 0.1;
        total = subTotal + tax;
        $('input[name="subTotal"]').val(subTotal);
        $('input[name="tax"]').val(tax);
        $('input[name="total"]').val(total);
        $('#subTotal').text(subTotal);
        $('#tax').text(tax);
        $('#total').text(total);
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/layouts/create_package/create_package_form.blade.php ENDPATH**/ ?>