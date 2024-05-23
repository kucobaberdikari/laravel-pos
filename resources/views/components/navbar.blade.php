<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <img src="{{url(auth()->user()->foto ?? '')}}" alt="User Avatar" class="img-size-28 img-profil img-circle"  onerror="this.onerror=null;this.src='image/avatar.jpg';">
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="{{route ('user.profil')}}" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item"
        onclick="document.getElementById('logout').submit()"
        >
          <i class="fas fa-arrow-to-left mr-2"></i> Log out
        </a>

        {{-- log out method --}}
        <form action="{{route('logout')}}" method="post" id="logout" style="display: none"> @csrf </form>
      </div>
    </li>
  </ul>
</nav>