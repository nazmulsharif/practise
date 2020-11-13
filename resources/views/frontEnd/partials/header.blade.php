
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a href="{{ Route('frontEnd.home')}}">Sailor</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="frontEnd/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class= @if(Route::is('frontEnd.home')) {{"active"}} @endif><a href="{{ Route('frontEnd.home')}}">Home</a></li>
          <li class= @if(Route::is('frontEnd.about_us')) {{"active"}} @endif><a href="{{ Route('frontEnd.about_us' )}}">About US</a></li>
          <li class= @if(Route::is('frontEnd.services')) {{"active"}} @endif><a href="{{ Route('frontEnd.services')}}"">Services</a></li>
          <li class= @if(Route::is('frontEnd.blog')) {{"active"}} @endif><a href="{{ Route('frontEnd.blog')}}"">Blog</a></li>
          <li class= @if(Route::is('frontEnd.contact')) {{"active"}} @endif><a href="{{ Route('frontEnd.contact')}}"">Contact</a></li>

        </ul>

      </nav><!-- .nav-menu -->

      
    </div>
  </header><!-- End Header -->