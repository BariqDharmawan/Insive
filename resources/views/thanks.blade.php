@extends('layouts.master')
@section('title', 'Thank You For Your Order!')
@section('css')
  <style media="screen">
    main {
      height: calc(100vh - 110px - 60px - 65px);
    }
    main .container {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    main h1 strong {
      text-transform: uppercase;
      text-decoration: underline;
    }
  </style>
@endsection
@section('content')
  <main>
    <div class="container">
      <h1 class="text-capitalize text--cream">thanks <strong>Cathy</strong> for your ordering!​</h1>
    </div>
  </main>
@endsection
