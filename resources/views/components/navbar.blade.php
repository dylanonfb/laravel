<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="/services" class="nav-link px-2 link-dark">Services</a></li>
          <li><a href="/about-us" class="nav-link px-2 link-dark">About Us</a></li>
          <li><a href="/contact-us" class="nav-link px-2 link-dark">Contact</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="/search">
          <input type="search" class="form-control" name="query" placeholder="Search..." aria-label="Search">
        </form>
        @if(Auth::check())
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/images/users/1.jpg" alt="mdo" width="32" height="32" class="rounded-circle" style="display:inline">
          </a>
          
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#" aria-disabled="true"> {{ Auth::user()->name }}</a></li>
            <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
            <li><a class="dropdown-item" href="/bookings">My Bookings</a></li>
            <li><hr class="dropdown-divider"></li>
               <!-- Authentication -->
               <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
          </ul>
         
        </div>
        @else
          <div class="block">
            <a href="{{route('login')}}">Login </a>
            <span>/</span>
          <a href="{{route('register')}}">Register </a>
          </div>
          @endif
      </div>
    </div>
  </header>