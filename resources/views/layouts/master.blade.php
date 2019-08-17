<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/native.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.2/css/boxicons.min.css' rel='stylesheet'>
    @yield('css') {{-- for css on each page --}}
    <title>Insive | @yield('title')</title>
  </head>
  <body id="@yield('body-id')">
    <nav>
      <ul>
        <li>
          <a href="">how to order</a>
          <a href="" id="close-menu"><i class='bx bx-x' ></i></a>
        </li>
        <li><a href="">custom sheet mask</a></li>
        <li><a href="{{ route('catalog.default') }}">buy from catalog</a></li>
        <li><a href="">FAQ</a></li>
        <li><a href="">beauty tips</a></li>
        <li><a href="{{ route('contactus') }}">contact us</a></li>
        <li><a href="">about us</a></li>
      </ul>
    </nav>
    <header>
      <a href="" id="show-menu"><i class='bx bx-menu'></i></a>
      <h1 class="page-title">@yield('page-title')</h1>
    </header>
    @yield('content')
    <footer>
      <div class="container text-center">
        &copy; {{ date('Y') }} <a href="{{ url('/') }}">Insive</a> | All Rights Reserved.
      </div>
    </footer>
    <script src="{{ asset('js/jquery.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/popper.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/native.js') }}" charset="utf-8"></script>
    @yield('script') {{-- for js on each page --}}
  </body>
</html>
