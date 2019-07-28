@extends('layouts.master')
@section('title', 'Landing Page')
@section('content')
  <main>
    <div class="container">
      <div id="landing-logo-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img/logo/logo.png') }}" height="200" alt="Slideshow Image">
            <h1>Insive</h1>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/muka/skin_acne.png') }}" height="400" alt="Slideshow Image">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/muka/skin_oily.png') }}" height="400" alt="Slideshow Image">
          </div>
        </div>
        <a class="carousel-control-prev" href="#landing-logo-carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#landing-logo-carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="landing-link">
        <a href="{{ route('register') }}"><i class='bx bx-user-plus'></i> register</a>
        <small>or</small>
        <a href="{{ route('login') }}">login <i class='bx bx-log-in-circle'></i></a>
      </div>
      <div class="recommend-link">
        <a href="">Custom your SHEET MASK!</a>
        <small>or</small>
        <a href="">buy from our catalog!</a>
      </div>
    </div>
  </main>
@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $('.carousel').carousel({
        interval: 4000
      })
    });
  </script>
@endsection
