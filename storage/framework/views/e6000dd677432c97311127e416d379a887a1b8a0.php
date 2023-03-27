
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Package Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Sub Total</th>
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
      <td><?php echo e($data->subtotal); ?></td>

    </tr>
    <?php
    $key++;
    ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">Grand total</td>
      <td><?php echo e(Cart::subtotal()); ?></td>

    </tr>
    <td colspan="4">Total with tax(21%)</td>
    <td><?php echo e(Cart::total()); ?></td>

    </tr>
  </tfoot>
</table>


<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>

<body>

  <h2>Cart Detaits</h2>

  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="<?php echo e(route('place_order')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" name="name" id="name" value="<?php echo e(auth()->user()->name); ?>">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" name="email" id="email" value="<?php echo e(auth()->user()->email); ?>">

              <label for="phone"><i class="fa fa-envelope"></i> Phone</label>
              <input type="tel" name="phone" id="phone" value="<?php echo e(auth()->user()->phone); ?>">

              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" type="text" name="address" id="address" value="<?php echo e(auth()->user()->address); ?>">


            </div>



          </div>
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <input type="submit" value="Payment" class="btn">
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

</body>

</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/layouts/service/cart/cart_checkout.blade.php ENDPATH**/ ?>