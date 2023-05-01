<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('dashboard')); ?>">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <!-- <?php if(auth()->user()->role_id == 1): ?> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('order')); ?>">
              <span data-feather="file" class="align-text-bottom"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('makeupartist_list')); ?>">
              <span data-feather="users" class="align-text-bottom"></span>
              Makeup Artists
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('co_artist_list')); ?>">
              <span data-feather="users" class="align-text-bottom"></span>
              Co-Artists
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('customer_list')); ?>">
              <span data-feather="users" class="align-text-bottom"></span>
              Customers 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('cat_list')); ?>">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('sub_cat_list')); ?>">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Sub Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('package_list')); ?>">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Package List
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('payment_list')); ?>">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Payment
            </a>
          </li>
        </ul>
      </div>
    </nav><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/include/sidebar.blade.php ENDPATH**/ ?>