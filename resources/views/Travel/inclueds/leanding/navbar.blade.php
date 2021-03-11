<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
       <a href="#" class="navbar-brand">
         <img src="{{ URL::asset('frontend/imagesTravel/mojo.png') }}" alt="logo">
       </a>
       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
          <span class="navbar-toggler-icon">
          </span>
       </button>

      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav ml-auto mr-3">
          <li class="nav-item mx-md-2">
            <a href="{{ route('home') }}" class="nav-link active">Home</a>
          </li>
          <li class="nav-item mx-md-2">
            <a href="#" class="nav-link">Paket travel</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbardrop"
              data-toggle="dropdown"
            >
              Services
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
              <a class="dropdown-item" href="#">Link 3</a>
            </div>
          </li>
          <li class="nav-item mx-md-2">
            <a href="#" class="nav-link">Testimonial</a>
          </li>
        </ul>
       
        @guest

        <form class="form-inline d-sm-block d-md-none" action="" onclick="event.preventDefault(): location.href='{{route('login')}}'; ">
          <button class="btn btn-login my-2 my-sm-0">
            Masuk
          </button>
        </form>
        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="" onclick="event.preventDefault(): location.href='{{ route('login')}}'; ">
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
            Masuk
          </button>
        </form>

        @endguest

        @auth

        <form class="form-inline d-sm-block d-md-none" 
        action="{{url('logout')}}" 
        method="POST">
          <button class="btn btn-login my-2 my-sm-0"  type="submit">
            @csrf
            logout
          </button>
        </form>
        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block" 
        action="{{url('logout')}}" 
        method="POST">
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
            @csrf
            logout
          </button>
        </form>
        
        @endauth

      </div>
    </nav>
  </div>