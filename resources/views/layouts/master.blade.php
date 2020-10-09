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
          <a href="{{ url('/') }}">Homepage</a>
          <a href="" id="close-menu"><i class='bx bx-x' ></i></a>
        </li>
        @auth
          @if (Auth::user()->role == 'admin')
            <li><a href="{{ route('admin.order.all') }}">All Order</a></li>
            <li><a href="{{ route('admin.invoice.all') }}">Print Invoice</a></li>
            <li><a href="{{ route('admin.recipe.all') }}">Print Recipe</a></li>
            <li><a href="{{ route('admin.product.index') }}">Admin Dashboard</a></li>
          @else
            <li><a href="{{ route('how-to-order') }}">how to order</a></li>
            <li><a href="{{ url('question') }}">custom sheet mask</a></li>
            <li><a href="{{ route('catalog.default') }}">buy from catalog</a></li>
            <li><a href="{{ route('faq.index') }}">FAQ</a></li>
            <li><a href="" class="disabled">beauty tips <small>(coming soon)</small></a></li>
            <li><a href="{{ route('profile.index') }}">My Profile</a></li>
          @endif
        @endauth
        @guest
          <li><a href="{{ route('how-to-order') }}">how to order</a></li>
          <li><a href="{{ url('question') }}">custom sheet mask</a></li>
          <li><a href="{{ route('catalog.default') }}">buy from catalog</a></li>
          <li><a href="{{ route('faq.index') }}">FAQ</a></li>
          <li><a href="" class="disabled">beauty tips <small>(coming soon)</small></a></li>
          
        @endguest
        <li><a href="{{ route('contact-us') }}">contact us</a></li>
      </ul>
    </nav>
    <header>
      <a href="" id="show-menu"><i class='bx bx-menu'></i></a>
      <h1 class="page-title">@yield('page-title')</h1>
      @if (\Request::is('catalog'))
        <a href="javascript:void(0);" class="bg--cream" id="cartBtn"><i class='bx bxs-cart'></i></a>
      @endif
    </header>
    @yield('content')
    <script src="{{ asset('js/jquery.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/popper.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/native.js') }}" charset="utf-8"></script>
    @yield('script') {{-- for js on each page --}}
  </body>
</html>
