<!-- Header -->
<section class="header">
  <nav>
    <a href="/"><img src="{{asset('/images/makeuplogo.png')}}" alt=""></a>
    <div class="nav-links" id="navLinks">
      <i class="fa fa-times" onclick="hideMenu()"></i>
      @include('frontend.include.navbarlinks')
    </div>
    <i class="fa fa-bars" onclick="showMenu()"></i>
  </nav>
  <div class="text-box">
    <h1>World's Biggest Makeup Artist Platform</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime molestias iste ducimus! <br>
      Doloremque repellendus voluptatem maiores vero fuga, iusto quam!</p>
    <a href="" class="hero-btn">Visit us to know more</a>
  </div>
</section>