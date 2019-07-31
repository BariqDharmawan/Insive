@extends('layouts.master')
@section('title', 'Custom Fragrance')
@section('page-title', 'Custom your own')
@section('content')
  <main>
    <div class="row">
      <div class="col">
        <img src="{{ asset('img/product.png') }}">
      </div>
      <div class="col-8">
        <p class="bg--cream">Formula Code: <var>#02139</var></p>
        <p>Choose your fragrance:</p>
        <ul>
          <li>
            <img src="{{ asset('img/logo/rose.png') }}" height="90" alt="Fragrance Item">
            <p></p>
          </li>
          <li>
            <img src="{{ asset('img/logo/strawberry.png') }}" height="90" alt="Fragrance Item">
            <p></p>
          </li>
          <li>
            <img src="{{ asset('img/logo/coffee.png') }}" height="90" alt="Fragrance Item">
            <p></p>
          </li>
          <li>
            <img src="{{ asset('img/logo/unscented.png') }}" height="90" alt="Fragrance Item">
            <p></p>
          </li>
        </ul>
      </div>
    </div>
  </main>
@endsection
