@extends('layouts.master')
@section('title', 'You Result')
@section('page-title', 'face results')
@section('content')
  <main>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <figure class="result mb-5 mb-md-0">
            <img height="350" class="d-block mx-auto" src="{{ asset('img/muka/skin_acne.png') }}" alt="Hasil Muka">
            <figcaption class="result__caption text-light">
              <p class="text--cream">Your acne was very terrible!</p>
              <p class="mb-0">
                Because acne is characterized by clogged pores and inflammation,
                face masks that contain exfoliating and anti-inflammatory ingredients can help improve acne!
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6">
          <figure class="product mb-0">
            <img height="350" src="{{ asset('img/product.png') }}" alt="">
            <figcaption class="text-light py-0">
              <strong class="text--cream d-block">Special ingredients for you: </strong>
              <p class="text-capitalize">salicylic acid & lemon stem cell extract </p>
            </figcaption>
          </figure>
        </div>
      </div>
      <div class="row py-5 justify-content-center justify-content-md-end align-items-center">
        <div class="col-12 col-md-6 row mx-0 justify-content-center">
          <a href="javascript:void(0)" class="btn bg--cream text-capitalize">
            Choose your sheet & fragrance! <i class='bx bx-chevron-right' ></i>
          </a>
        </div>
      </div>
    </div>
  </main>
@endsection
