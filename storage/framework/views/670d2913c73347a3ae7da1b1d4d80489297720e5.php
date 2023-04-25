<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>

  
  </html>
  
  <body>
    <form action="<?php echo e(route('payment_submit',$pak2)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <fieldset>
        
            <legend>Payment Information</legend>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="<?php echo e(auth()->user()->name); ?>"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo e(auth()->user()->email); ?>"><br>

            <label for="transaction-number" style="text-align: center;">QR Bar Code</label>
            <img class="center" style="display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 50%; height:150px; width:150px;
                    border: 2px solid black;
                    font-weight: bold;
        padding: 10px;" src="<?php echo e(asset('/uploads/payment/bkash.jpg')); ?>" /><br>

            <label for="transaction-number">Transaction Number:</label>
            <input type="text" id="transaction-number" name="transaction_number" required><br>

            <label for="transaction-amount">Transaction Amount:</label>
            <input type="text" id="transaction-amount" name="transaction_amount" required value=""><br>

            <?php
            $today = \Carbon\Carbon::now();
            $formattedDate = $today->format('Y-m-d');
            ?>
            <label for="date">Date:</label>
            <input type="date" id="text" name="date" required value="<?php echo e($formattedDate); ?>"><br>



            <label for="city">City:</label>
            <input type="text" id="address" name="address" required required value="<?php echo e(auth()->user()->address); ?>"><br>

            <label for="phone-number">Phone Number:</label>
            <input type="tel" id="phone-number" name="phone" required value="<?php echo e(auth()->user()->phone); ?>"><br>

            <input type="submit" value="Submit Payment">
            <a class="btn btn-danger" href="<?php echo e(route('sub_order_delete',$value)); ?>" role="button">Cancel</a>
        </fieldset>
    </form>
</body>

</html><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/layouts/service/place_order/payment.blade.php ENDPATH**/ ?>