<!-- Navbar -->

<nav class="bg-secondary">
  <a href="/"><img src="<?php echo e(asset('/images/makeuplogo.png')); ?>" alt=""></a>
  <?php echo $__env->make('frontend.include.navbarlinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <i class="fa fa-bars" onclick="showMenu()"></i>
</nav><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/include/navbar.blade.php ENDPATH**/ ?>