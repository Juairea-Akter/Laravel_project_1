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
    <p>You can find here the varity of makeup services from the best makeup artists. 
      <br> Our makeup asrtists are very much passionate about their work and they make you more beautiful with their creative touch.</p>
   
  </div>
</section>