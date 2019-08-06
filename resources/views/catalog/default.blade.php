@extends('layouts.master')
@section('title', 'Our Catalog')
@section('page-title', 'OUR CATALOG')
@section('body-id', 'catalog-page')
@section('content')
  <main>
    <div class="container">
      <form class="row" id="shopCart" action="/post" method="post">
        @csrf
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <div class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <div class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <div class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <div class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <div class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <div class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <div class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <div class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </div>
            </figcaption>
          </figure>
        </div>
      </form>
      <div class="row justify-content-center justify-content-md-end my-5">
        <button type="submit" form="shopCart" class="btn">Go To My Chart <i class='bx bx-caret-right'></i></button>
      </div>
    </div>
  </main>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      defaultValue = 1;
      $(".product__button").attr('href', 'javascript:void(0)');
      $(".product__button--increase").click(function(){
        $(this).next('input').val(parseInt($(this).next('input').val(), 10) + 1);
        defaultValue += parseInt($(this).next('input').val(), 10) + 1;
    	});
    	$(".product__button--decrease").click(function(){
        var newValue = parseInt($(this).prev('input').val(), 10) - 1;
        $(this).prev('input').val(parseInt($(this).prev('input').val(), 10) - 1);
        defaultValue += parseInt($(this).prev('input').val(), 10) - 1;
    	});
    });
  </script>
@endsection
