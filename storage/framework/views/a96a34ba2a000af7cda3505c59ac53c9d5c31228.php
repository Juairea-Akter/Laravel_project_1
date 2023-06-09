<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('makeup_artist_dashboard')); ?>">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('m_co_artist_list')); ?>">
              <span data-feather="users" class="align-text-bottom"></span>
              Co-Artists
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('m_cat_list')); ?>">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('m_sub_cat_list')); ?>">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Sub Categories
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('m_appointment_list')); ?>">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Appointment List
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Profile
            </a>
          </li>  
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/makeup_artist/m_include/m_sidebar.blade.php ENDPATH**/ ?>