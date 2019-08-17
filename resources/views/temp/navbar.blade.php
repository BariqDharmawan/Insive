<nav class="main-header navbar navbar-expand bg-info navbar-dark border-bottom">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ url('/') }}" class="nav-link">Home</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="btn btn-link" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
          <i class="fa fa-power-off"></i>
      </a>
      <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="post">
        @csrf
      </form>
    </li>
  </ul>
</nav>
