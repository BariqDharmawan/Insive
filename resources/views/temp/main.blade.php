<!DOCTYPE html>
<html lang="en">
@include('temp.head')
<body class="hold-transition sidebar-mini pr-0">
  <div class="wrapper">
    @include('temp.navbar')
    <aside class="main-sidebar sidebar-light-info elevation-4">
      <a href="{{ url('/') }}" class="brand-link bg-info">
        <img src="{{ asset('img/logo/IS icon jpg.jpg') }}" alt="Insive Logo" class="brand-image img-circle elevation-1">
        <span class="brand-text font-weight-light">Admin Insive</span>
      </a>
      @include('temp.sidebar')
    </aside>
    <div class="content-wrapper pb-4">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">@yield('title-body')</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="{{ url('admin/dashboard') }}">Home</a>
                  <li class="breadcrumb-item active">@yield('title-body')</li>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    <footer class="main-footer text-center">Copyright {{ date('Y') }} | Insive</footer>
  </div>
  @include('temp.scripts')
</body>
</html>
