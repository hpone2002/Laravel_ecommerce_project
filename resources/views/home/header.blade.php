<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.html">
        <span>
          Giftos
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item">
            @guest
            <a class="nav-link" href="{{url('/')}}">Home<span class="sr-only">(current)</span></a>
            @endguest

            @auth
            <a class="nav-link" href="{{url('/login_home')}}">Home <span class="sr-only">(current)</span></a>
            @endauth

          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('shop')}}">
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('why_us')}}">
              Why Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('testimonial')}}">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('contact_us')}}">Contact Us</a>
          </li>
          @auth
            <li class="nav-item">
              <a class="nav-link" href="myorder">My Orders</a>
            </li>
          @endauth
        </ul>
        <div class="user_option">

          @guest
          <span>
            <a href="{{url('/login')}}">
                <i class="fa fa-user" aria-hidden="true"></i>
              Login
              </span>
            </a>
            <a href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>
                Register
              </span>
            </a>
          @endguest

          
          @auth
            <a href="{{url('mycart')}}" class="btn btn-sm badge-danger text-white">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span style="font-size: 14px; font-weight: bold;" class="ms-3">
                  {{ $cart_count }}
              </span>
            </a>

            <form action="{{url('logout')}}" style="margin-right: 25px;" method="POST">
              @csrf
              <button class="btn btn-primary btn-sm" type="submit">
                Logout
              </button>
            </form>

            @if (auth()->user()->user_type === 'admin')
              <a href="{{ url('admin/dashboard') }}" class="btn btn-sm badge-success text-white">
                Admin dashboard
              </a>
            @endif
          @endauth

        </div>
      </div>
    </nav>
  </header>