@if (Route::has('login') && Auth::check())

<div class="nav-links" id="navLinks">
    <i class="fa fa-times" onclick="hideMenu()"></i>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/">About</a></li>
        <li><a href="/#serviceSection">Service</a></li>
        <li><a href="/">Contact</a></li>
        <li><a href="{{route('customer_payment_details')}}">Payment</a></li>

        <li><a class=" " id="" href="{{route('signout')}}" aria-expanded="false">Sign Out</a></li>

        <li><a href="{{route('cart_list')}}">Cart({{count(Cart::content())}})</a></li>

    </ul>
</div>

@elseif (Route::has('login') && !Auth::check())
<div class="nav-links" id="navLinks">
    <i class="fa fa-times" onclick="hideMenu()"></i>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/">About</a></li>
        <li><a href="/#serviceSection">Service</a></li>
        <li><a href="/">Contact</a></li>

        <li class="nav-item dropdown text-light">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sign up</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-dark" href="{{route('makeup_artist_registration')}}">Makeup Artist</a></li>
                <li><a class="dropdown-item text-dark" href="{{route('cus_registration')}}">Customer</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown text-light">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sign in</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-dark" href="{{route('makeup_artist_login')}}">Makeup Artist</a></li>
                <li><a class="dropdown-item text-dark" href="{{route('customer_login')}}">Customer</a></li>
            </ul>
        </li>
        <li><a href="{{route('cart_list')}}">Cart({{count(Cart::content())}})</a></li>

    </ul>
</div>

@endif