@extends('layouts.master')
@section('title', 'Your Selected')
@section('page-title', 'CATALOG SELECTED')
@section('content')
  <main>
    <div class="container py-5">
      <figure class="product-selected">
        <div class="row mx-0">
          <img src="{{ asset('img/product.png') }}" class="col" alt="Selected Catalog">
          <figcaption class="col-md-8 py-3 px-0 row justify-content-between align-content-between mx-0">
            <p class="font-weight-bold mb-5 text-center text-md-left w-100">Formula Code: <var class="d-block font-weight-bolder">#02139</var></p>
            <a href="" class="btn bg--cream col-5 col-md-auto">Fill Shipping Address directly</a>
            <a href="" class="btn bg--cream col-5 col-md-auto">Continue with Login</a>
          </figcaption>
        </div>
      </figure>
    </div>
  </main>
@endsection
