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
                    @foreach ($price as $value)
                    @if ($value->price_name == 'trial')
                    @php
                    $price_first = $value->price;
                    @endphp
                    <figure class="fragrance text-center col-6 py-3 col-lg-auto">
                        <img src="{{ asset('img/package/trial.png') }}" height="100" width="100" alt="Trial">
                        <figcaption class="text--cream">
                            <input type="radio" name="fragrance" class="d-none" id="pricing_trial">
                            <label class="m-0" for="pricing_trial"><var>{{$value->min_qty}}-{{$value->max_qty}} pcs</var> (Rp {{number_format($value->price, 0)}})​</label>
                        </figcaption>
                    </figure>
                    @endif
                    @if ($value->price_name == 'medium')
                    <figure class="fragrance text-center col-6 py-3 col-lg-auto">
                        <h2 class="text-center text--cream font-weight-bold">Medium <small class="d-block">Package</small></h2>
                        <figcaption class="text--cream">
                            <input type="radio" name="fragrance" class="d-none" id="pricing_medium">
                            <label class="m-0" for="pricing_medium"><var>{{$value->min_qty}}-{{$value->max_qty}} pcs</var> ​<del>(Rp {{number_format($price_first, 0)}})</del> (Rp {{number_format($value->price, 0)}})​</label>
                        </figcaption>
                    </figure>
                    @endif
                    @if ($value->price_name == 'large')
                    <figure class="fragrance text-center col-6 py-3 col-lg-auto">
                        <h2 class="text-center text--cream font-weight-bold">Large <small class="d-block">Package</small></h2>
                        <figcaption class="text--cream">
                            <input type="radio" name="fragrance" class="d-none" id="pricing_large">
                            <label class="m-0" for="pricing_large"><var> >{{$value->min_qty}} pcs</var> <del>(Rp {{number_format($price_first, 0)}})</del> (Rp {{number_format($value->price, 0)}})​</label>
                        </figcaption>
                    </figure>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-center justify-content-lg-end py-5">
            <button type="submit" class="btn bg--cream"><b>Next, </b> choose your mask type​ <i class='bx bx-caret-right'></i></button>
        </div>
    </div>
</main>
@endsection
