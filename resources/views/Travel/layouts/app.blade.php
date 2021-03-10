
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    @include('Travel.inclueds.leanding.styles')

    @stack('prepand-style')
    @stack('addon-style')
    <title>@yield('title')</title>
  </head>
  <body>
    <!-- navbar -->
    @include('Travel.inclueds.leanding.navbar')
    @yield('content')
    @include('Travel.inclueds.leanding.footer')
    @include('Travel.inclueds.leanding.scripts')

    @stack('addon-script')
    @stack('prepand-script')
  </body>
</html>
