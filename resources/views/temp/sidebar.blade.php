<div class="sidebar mySimpleBar"  data-simplebar data-simplebar-auto-hide="true">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('img/logo/IS icon png.png') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block text-capitalize">Admin</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (Request::is('admin/dashboard'))? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header text-uppercase">Menu</li>
        <li class="nav-item">
          <a href="{{ route('admin.question.index') }}" class="nav-link {{ (Request::is('admin/question'))? 'active' : '' }}">
            <i class="nav-icon fa fa-question"></i>
            <p>
              Question
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.logic.index') }}" class="nav-link {{ (Request::is('admin/logic'))? 'active' : '' }}">
            <i class="nav-icon fa fa-question"></i>
            <p>
              Logic
            </p>
          </a>
        </li>
        {{-- <li class="nav-item has-treeview {{ (Request::segment(1) == "transaction")? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (Request::segment(1) == "transaction")? 'active' : '' }}">
            <i class="nav-icon fa fa-opencart"></i>
            <p>
              Transaction
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link {{ (Request::segment(1) == "transaction" && Request::segment(2) == null)? 'active' : '' }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link {{ (Request::segment(2) == "create")? 'active' : '' }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Create</p>
              </a>
            </li>
          </ul>
        </li> --}}
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
