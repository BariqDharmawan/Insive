@extends('layouts.master')

@section('title', $title)

@section('page-title', $title)

@section('body-id', 'custom-fragrance-page')

@section('content')

<main>
    <div class="container py-5">
        <figure class="row no-gutters justify-content-center">
            <img src="{{ asset('img/product.png') }}" alt="Product you buy on Insive" 
            class="mb-2 mb-md-0 col-auto img-fluid">
            <figcaption class="col-lg-8 text--cream row no-gutters flex-column">
                <div class="bg--cream p-1 px-3 font-weight-bold text-body mb-4">
                    Formula code: <var>#02139</var>
                </div>
                <div class="h5">
                    <p>Serum : <span>serum name</span></p>
                    <p>Sheet mask: <span>sheet mask name</span></p>
                </div>
                <div class="mt-auto d-flex justify-content-between">
                    <h2 class="font-weight-bold h4">Total price: <var class="not-italic">@currency(7000)</var></h2>
                    <a href="" class="btn d-inline-flex font-weight-bold btn-sm bg--cream text-body">
                        Continue to Shipping & Payment
                    </a>
                </div>
            </figcaption>
        </figure>
    </div>
</main>

@endsection