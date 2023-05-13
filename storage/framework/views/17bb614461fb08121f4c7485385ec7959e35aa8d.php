
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Package Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
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
      <td><?php echo e($data->price); ?> Tk</td>
    </tr>
    <?php
    $key++;
    ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3" class="text-end">Subtotal </td>
      <td colspan="1"><?php echo e(Cart::subtotal()); ?> Tk</td>
    </tr>
    <tr>
      <td colspan="3" class="text-end">Tax (10%)</td>
      <td colspan="1"><?php echo e(Cart::tax()); ?> Tk</td>

    </tr>
    <tr>
      <td colspan="3" class="text-end">Total </td>
      <td colspan="1"><?php echo e(Cart::total()); ?> Tk</td>
    </tr>
  </tfoot>
</table>

  <style>
    body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }
  </style>
  <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="<?php echo e(route('submit',[$data->id,$data->total,$data->qty])); ?> " method="post">
          <?php echo csrf_field(); ?>
          <div class="row">
            <div class="col-50">
              <h3>Cart Details</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" name="name" id="name" value="<?php echo e(auth()->user()->name); ?>">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" name="email" id="email" value="<?php echo e(auth()->user()->email); ?>">

              <label for="phone"><i class="fa fa-envelope"></i> Phone</label>
              <input type="tel" name="phone" id="phone" value="<?php echo e(auth()->user()->phone); ?>">

              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" type="text" name="address" id="address" value="<?php echo e(auth()->user()->address); ?>">
            </div>

            <div class="form-group">
              <label for="date">Select Date:</label>
              <input type="date" id="datepicker" name="date" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputCategoryName" class="form-label">Time Slot</label>
              <select name="time" id="exampleInputDescription" class="form-control">
                <option value="">Choose Time Slot</option>

                <option value="8:30AM-11:30AM">8:30AM-11:30AM</option>
                <option value="12:30PM-3:30PM">12:30PM-3:30PM</option>
                <option value="4:30PM-7:30PM">4:30PM-7:30PM</option>

              </select>
            </div>

          </div>
          <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger" role="alert">
                <strong>Error: <?php echo e($message); ?></strong>
                <p class="text-dark m-0 p-0">Please select different time or date and try again. </p>
            </div>
          <?php endif; ?>
          <input type="submit" value="Submit">

        </form>
      </div>
    </div>

    <!-- <div class="col-25">
      <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
        <p>Product 1 (2 x) <span class="price">$15</span></p>
        <p>Product 2 (2 x) <span class="price">$5</span></p>
        <p>Product 3 (2 x) <span class="price">$8</span></p>
        <p>Product 4 (2 x) <span class="price">$2</span></p>
        <hr>
        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
      </div>
    </div> -->
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/layouts/service/cart/cart_checkout.blade.php ENDPATH**/ ?>