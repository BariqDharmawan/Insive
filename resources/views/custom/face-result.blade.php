@extends('layouts.master')
@section('title', 'You Result')
@section('page-title', 'face results')
@section('body-id', 'face-result-page')
@section('content')
<main>
  <div class="container py-4">
    <div class="row">
      <div class="col-12 col-md-6">
        <figure class="result mb-5 mb-md-0">
          <div class="nav justify-content-center">
            <img height="350" class="d-block mx-auto" src="{{ asset('img/muka/'.$result->face_icon) }}" alt="Hasil Muka">
          </div>
          <figcaption class="result__caption text-light">
            <h4 class="text--cream text-center">
              <b>{{ $result->face_title }}</b>
            </h4>
            <p class="mb-0 text-justify" style="font-size: 1.1rem">
              <b>{{ $result->face_description }}</b>
            </p>
          </figcaption>
        </figure>
      </div>
      <form action="{{ route('main.options_face_result') }}" method="post" class="col-12 col-md-6 text-center">
      @csrf
        <h3 class="text--cream">Choose Your Products (you can tick both)</h3>
        <div class="row justify-content-between my-5">
          <div class="col-md-6 col-lg-5">
            <input type="checkbox" class="product__pick" name="options[]" value="sheet">
            <figure class="product mb-0 position-relative">
              <img height="350" src="{{ asset('img/product.png') }}" style="height: auto">
              <figcaption class="product__detail">
                <span>Sheet mask</span>
              </figcaption>
          </figure>
          </div>
          <div class="col-md-6 col-lg-5">
            <input type="checkbox" class="product__pick" name="options[]" value="serum">
            <figure class="product mb-0 position-relative">
              <img height="350" src="{{ asset('img/product.png') }}" style="height: auto">
              <figcaption class="product__detail">
                <span>Serum</span>
              </figcaption>
            </figure>
          </div>
        </div>
        <p class="text-capitalize h5">
          <span class="text--cream d-block">Special ingredients for you:</span>
          <span class="text-white d-block">{{ $result->special_ingredients }}</span>
        </p>
        <button id="btnNextCustom"
        class="btn bg--cream mt-5 d-inline-flex mx-auto text-capitalize">
          Next, Start to Customize <i class='bx bx-chevron-right' ></i>
      </button>
      </form>
    </div>
  </div>
</main>
@endsection