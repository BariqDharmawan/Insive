@extends('layouts.master')
@section('title', 'Payment Error')
@section('body-id', 'error-page')
@section('page-title', 'Payment Error')
@section('content')
  <main>
    <div class="container flex-column">
      <h1>Your Paid Has Been Error</h1>
      <a href="{{ url('/') }}" class="btn btn-light mt-4"><i class='bx bxs-home' ></i> Back To Homepage</a>
    </div>
  </main>
@endsection
