

<div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
    Hello   {{ Auth::user()->name }}
  </a></div>
<div class="sidebar-wrapper">
  <ul class="nav">
    <li class="nav-item active  ">
      <a class="nav-link" href="{{route('dashAdminTravel')}}">
        <i class="material-icons">dashboard</i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{url('/Travel/travel-pacage')}}">
        <i class="material-icons">airport_shuttle</i>
        <p>Paket travel</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/Travel/gallery') }}">
        <i class="material-icons">image</i>
        <p>Galery Travel</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ route('transactions.index') }}">
        <i class="material-icons">monetization_on</i>
        <p>Transaksi</p>
      </a>
    </li>
  </ul>
</div>