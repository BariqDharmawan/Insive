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
    @yield('content')
    <script src="{{ asset('js/jquery.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/popper.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/native.js') }}" charset="utf-8"></script>
    @yield('script') {{-- for js on each page --}}
  </body>
</html>
