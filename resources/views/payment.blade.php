@extends('layouts.master')
@section('title', 'Payment')
@section('body-id', 'payment-page')
@section('page-title', 'payment')
@section('content')
  <main>
    <div class="container py-5">
      <div class="row">
        <div class="col-12 col-md-4">
          <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
        </div>
        <div class="col-12 col-md-8">
          <form action="index.html" method="post">
            <p class="bg--cream my-4 my-md-2 py-1 px-2 d-md-inline-block">Formula Code: <var class="font-weight-bold">#02139</var></p>
            <p class="text--cream px-2 px-md-0 mb-5 my-md-4">Total Payment:​</p>
            <div class="form-group form-row">
              <label class="text--cream col-auto col-form-label">3 Days Package = </label>
              <div class="input-group col">
                <div class="input-group-prepend bg-transparent">
                  <div class="input-group-text bg-transparent text--cream pl-0" style="border-color: transparent">Rp.</div>
                </div>
                <input type="text" class="form-control-plaintext text--cream" name="" value="75000​">
              </div>
            </div>
            <div class="form-group form-row">
              <label class="text--cream col-auto col-form-lab mb-0 d-flex align-items-center">+ Shipping cost to Jakarta Selatan,</label>
              <div class="input-group col">
                <div class="input-group-prepend bg-transparent">
                  <div class="input-group-text bg-transparent text--cream pl-0" style="border-color: transparent">Rp.</div>
                </div>
                <input type="text" class="form-control-plaintext text--cream" name="" value="9000​">
              </div>
            </div>
            <div class="form-group form-row">
              <label class="text--cream col-auto col-form-label" style="font-size: 2rem">Sub Total = </label>
              <div class="input-group col" style="font-size: 2rem;">
                <div class="input-group-prepend bg-transparent">
                  <div class="input-group-text bg-transparent text--cream pl-0" style="border-color: transparent; font-size: 2rem;">Rp.</div>
                </div>
                <input type="text" class="form-control-plaintext text--cream" name="" value="75000​">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row justify-content-end mx-0">
        <button type="submit" class="btn bg--cream float-right">Choose your payment method​</button>
      </div>
    </div>
  </main>
@endsection
