@extends('layouts.master')
@section('title', 'Payment Finished')
@section('body-id', 'finish-page')
@section('content')
  <main>
    <div class="container py-4 flex-column">
      <h1 class="text--cream">Thanks <span>Cathy</span> <br> For Ordering!</h1>
      <a href="{{ url('/') }}" class="btn bg--cream mt-4"><i class='bx bxs-home' ></i> Back To Homepage</a>
    </div>
  </main>
@endsection
