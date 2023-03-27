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
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime molestias iste ducimus! <br>
      Doloremque repellendus voluptatem maiores vero fuga, iusto quam!</p>
    <a href="" class="hero-btn">Visit us to know more</a>
  </div>
</section><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/frontend/include/header.blade.php ENDPATH**/ ?>