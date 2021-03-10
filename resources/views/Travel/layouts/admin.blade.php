
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   This Admin Travel
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  @include('Travel.inclueds.admin.style')
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ URL::asset('backendAdmin//assets/img/sidebar-1.jpg')}}">
      @include('Travel.inclueds.admin.navbar')
    </div>
    <div class="main-panel">
      @include('Travel.inclueds.admin.sidebar')
      @yield('content')
      @include('Travel.inclueds.admin.footer')
    </div>
  </div>
 @include('Travel.inclueds.admin.script')
</body>
</html>