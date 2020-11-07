@extends('layouts.master')

@section('title', "Summary Order")

@section('page-title', "Summary Order")

@section('body-id', 'custom-fragrance-page')

@section('content')

<main>
    <div class="container py-5">
        <figure class="row no-gutters justify-content-center">
            <img src="{{ asset('img/product.png') }}" alt="Product you buy on Insive" 
            class="mb-2 mb-md-0 col-auto img-fluid">
            <figcaption class="col-lg-8 text--cream row no-gutters flex-column">
                <div class="bg--cream p-1 px-3 font-weight-bold text-body mb-4">
                    Formula code: <var>#01234</var>
                </div>
                <div class="h5">
                    <p>Catalog :
                        <br>
                        @php
                         $total_price = 0;
                        @endphp 
                        @foreach ($sub_cart as $items)
                        @php
                         $total_price += $items->total_price;   
                        @endphp
                        - <span>{{$items->product_name}}</span>
                        <br> 
                        &nbsp;&nbsp;Qty: <span>{{$items->qty}}</span>
                        &nbsp;&nbsp;Price: <span>@currency($items->total_price)</span>
                        <br>
                        <br>
                        @endforeach
                    </p>
                    {{-- <p>Qty : <span>{{$items->qty}}</span></p>
                    <p>Price : <span>{{$items->total_price}}</span></p> --}}
                </div>
                <div class="mt-auto d-flex justify-content-between">
                    <h2 class="font-weight-bold h4">
                        Total price: 
                        <var class="not-italic">
                            @currency($total_price)
                        </var>
                    </h2>
                    <a href="{{route('cart.fill.address.catalog')}}"
                    class="btn d-inline-flex font-weight-bold btn-sm bg--cream text-body">
                        Continue to Shipping & Payment
                    </a>
                </div>
            </figcaption>
        </figure>
    </div>
</main>

@endsection