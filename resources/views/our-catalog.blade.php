@extends('layouts.master')
@section('title', 'Our Catalog')
@section('page-title', 'OUR CATALOG')
@section('content')
  <main>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <form class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </form>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <form class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </form>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <form class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </form>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <form class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </form>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <form class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </form>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <form class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </form>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <form class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </form>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <figure class="product">
            <img src="{{ asset('img/product.png') }}" alt="Our Product">
            <figcaption>
              <p class="text--cream">Nama Produk</p>
              <var class="text--cream">Rp. 19,999</var>
              <form class="product__price">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="1" value="1" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </form>
            </figcaption>
          </figure>
        </div>
      </div>
      <div class="row justify-content-center justify-content-md-end my-5">
        <a href="" class="btn">Go To My Chart <i class='bx bx-caret-right'></i></a>
      </div>
    </div>
  </main>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      var x = 1;
    	$(".product__price input").attr('value', x);
      $(".product__button--increase").click(function(e){
        e.preventDefault();
        $(this).next().attr('value', ++x);
    	});
    	$(".product__button--decrease").click(function(e){
        e.preventDefault();
        $(this).prev().attr('value', --x);
    	});
    });
  </script>
@endsection
