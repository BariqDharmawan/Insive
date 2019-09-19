@extends('layouts.master')
@section('title', 'Thank You For Your Order!')
@section('css')
  <style media="screen">
    main {
      display: flex;
      align-items: center;
      height: calc(100vh - 110px - 60px - 65px);
    }
    main h1 strong {
      text-transform: uppercase;
      text-decoration: underline;
    }
    main h4:hover {
      color: #E2CCC1 !important;
    }
  </style>
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row justify-content-center mb-3">
        <h1 class="text-capitalize text--cream mb-4 w-100 text-center">thanks <strong>{{ Auth::user()->name }}</strong> for your ordering!​</h1>
        <h4 class="text--cream">Let's Continue Shopping!</h4>
      </div>
      <div class="row justify-content-center mb-4">
        <a href="{{ route('main.question') }}" class="btn bg--cream">Yapp, I wanna Custom Mask Again</a>
        <span class="text-secondary d-inline-flex align-items-center mx-4">or</span>
        <a href="{{ route('catalog.default') }}" class="btn bg--cream">Sure, Take Me To The Catalog</a>
      </div>
      <div class="row justify-content-center">
        <a href="{{ url('/') }}" class="btn text-capitalize btn-link text--cream">Nope, I just wanna to homepage</a>
      </div>
    </div>
  </main>
@endsection
