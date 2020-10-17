@extends('layouts.master')
@section('title', 'You Result')
@section('page-title', 'face results')
@section('body-id', 'face-result-page')
@section('content')
<main>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <figure class="result mb-5 mb-md-0">
          <div class="nav justify-content-center">
            <img height="350" class="d-block mx-auto" src="{{ asset('img/muka/'.$result->face_icon) }}" alt="Hasil Muka">
          </div>
          <figcaption class="result__caption text-light">
            <h4 class="text--cream text-center"><b>{{$result->face_title}}</b></h4>
            <p class="mb-0 text-justify" style="font-size: 1.1rem">
              <b>{{$result->face_description}}</b>
            </p>
          </figcaption>
        </figure>
      </div>
      <div class="col-12 col-md-6">
        <figure class="product mb-0">
          <img height="350" src="{{ asset('img/product.png') }}" alt="">
          <figcaption class="text-light py-0">
            <strong class="text--cream d-block">Special ingredients for you: </strong>
            <p class="text-capitalize">{{$result->special_ingredients}} </p>
          </figcaption>
        </figure>
      </div>
    </div>
    <div class="row py-5 justify-content-center justify-content-md-end align-items-center">
      <div class="col-12 col-md-6 row mx-0 justify-content-center">
        <a href="{{ route('main.fragrance') }}" class="btn bg--cream text-capitalize">
          Choose your sheet & fragrance! <i class='bx bx-chevron-right' ></i>
        </a>
      </div>
    </div>
  </div>
</main>
@endsection
