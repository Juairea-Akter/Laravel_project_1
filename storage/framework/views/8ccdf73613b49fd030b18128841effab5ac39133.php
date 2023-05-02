<?php if(Route::has('login') && Auth::check()): ?>

<div class="nav-links" id="navLinks">
    <i class="fa fa-times" onclick="hideMenu()"></i>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/">About</a></li>
        <li><a href="/#serviceSection">Service</a></li>
        <li><a href="/">Contact</a></li>
        <li><a href="<?php echo e(route('customer_payment_details')); ?>">Payment</a></li>

        <li><a class=" " id="" href="<?php echo e(route('signout')); ?>" aria-expanded="false">Sign Out</a></li>

        <li><a href="<?php echo e(route('cart_list')); ?>">Cart(<?php echo e(count(Cart::content())); ?>)</a></li>

    </ul>
</div>

<?php elseif(Route::has('login') && !Auth::check()): ?>
<div class="nav-links" id="navLinks">
    <i class="fa fa-times" onclick="hideMenu()"></i>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/#serviceSection">Service</a></li>

        <li class="nav-item dropdown text-light">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sign up</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-dark" href="<?php echo e(route('makeup_artist_registration')); ?>">Makeup Artist</a></li>
                <li><a class="dropdown-item text-dark" href="<?php echo e(route('cus_registration')); ?>">Customer</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown text-light">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sign in</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-dark" href="<?php echo e(route('makeup_artist_login')); ?>">Makeup Artist</a></li>
                <li><a class="dropdown-item text-dark" href="<?php echo e(route('customer_login')); ?>">Customer</a></li>
            </ul>
        </li>
        <li><a href="<?php echo e(route('cart_list')); ?>">Cart(<?php echo e(count(Cart::content())); ?>)</a></li>

    </ul>
</div>

<?php endif; ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/include/navbarlinks.blade.php ENDPATH**/ ?>