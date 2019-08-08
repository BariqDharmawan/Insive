@extends('layouts.master')
@section('title', 'Custom Package')
@section('body-id', 'custom-package-page')
@section('page-title', 'Custom Your Own')
@section('content')
  <main>
    <div class="container py-5">
      <div class="row">
        <div class="col-12 col-lg-4">
          <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
        </div>
        <div class="col-12 col-lg-8 d-flex d-lg-block flex-wrap justify-content-center">
          <p class="bg--cream my-4 my-lg-2 py-1 px-2 d-lg-inline-block">Formula Code: <var class="font-weight-bold">#02139</var></p>
          <p class="text--cream px-2 px-lg-0 mb-5 my-lg-4 w-100 text-center text-lg-left">Package:</p>
          <div class="row mx-0 px-2 justify-content-between">
            <figure class="fragrance text-center col-6 py-3 col-lg-auto">
              <img src="{{ asset('img/package/trial.png') }}" height="100" width="100" alt="Trial">
              <figcaption class="text--cream">
                <input type="radio" name="fragrance" class="d-none" id="pricing_trial">
                <label class="m-0" for="pricing_trial"><var>1-2 pcs</var> (Rp 29,900)​</label>
              </figcaption>
            </figure>
            <figure class="fragrance text-center col-6 py-3 col-lg-auto">
              <h2 class="text-center text--cream font-weight-bold">Medium <small class="d-block">Package</small></h2>
              <figcaption class="text--cream">
                <input type="radio" name="fragrance" class="d-none" id="pricing_medium">
                <label class="m-0" for="pricing_medium"><var>3-6 pcs</var> ​<del>(Rp 29,900)</del> (Rp 25,000)​</label>
              </figcaption>
            </figure>
            <figure class="fragrance text-center col-6 py-3 col-lg-auto">
              <h2 class="text-center text--cream font-weight-bold">Large <small class="d-block">Package</small></h2>
              <figcaption class="text--cream">
                <input type="radio" name="fragrance" class="d-none" id="pricing_large">
                <label class="m-0" for="pricing_large"><var> > 7pcs</var> <del>(Rp 29,900)</del> (Rp 22,000)​</label>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
      <div class="row justify-content-center justify-content-lg-end py-5">
        <button type="submit" class="btn bg--cream"><b>Next, </b> choose your mask type​ <i class='bx bx-caret-right'></i></button>
      </div>
    </div>
  </main>
@endsection
