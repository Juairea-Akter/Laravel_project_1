<!-- Header -->
<section class="header">
  <nav>
    <a href="/"><img src="<?php echo e(asset('/images/makeuplogo.png')); ?>" alt=""></a>
    <div class="nav-links" id="navLinks">
      <i class="fa fa-times" onclick="hideMenu()"></i>
      <?php echo $__env->make('frontend.include.navbarlinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <i class="fa fa-bars" onclick="showMenu()"></i>
  </nav>
  <div class="text-box">
    <h1>World's Biggest Makeup Artist Platform</h1>
    <p>You can find here the varity of makeup services from the best makeup artists. 
      <br> Our makeup asrtists are very much passionate about their work and they make you more beautiful with their creative touch.</p>
   
  </div>
</section><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/include/header.blade.php ENDPATH**/ ?>