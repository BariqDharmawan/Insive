@extends('layouts.master')
@section('title', 'Our Catalog')
@section('page-title', 'OUR CATALOG')
@section('body-id', 'catalog-page')
@section('content')
  <aside>
    <h1 class="text--cream">Your Cart</h1>
    <a href="javascript:void(0);" class="btn btn-link text--cream btn-close"><i class='bx bx-x'></i></a>
    <form action="" class="py-4" method="post">
      @csrf
      <div class="form-row">
        <div class="form-group col-12">
          <div class="row mx-0 justify-content-between">
            <figure class="col-6 col-md-auto px-0 mb-0 d-flex align-items-center">
              <img src="{{ asset('img/product.png') }}" height="90">
              <figcaption class="text--cream">
                Nama Product
              </figcaption>
            </figure>
            <div class="col-auto px-0 product__action mr-2 mr-md-0">
              <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
              <input type="number" name="jumlah_beli" min="0" value="0" required>
              <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
            </div>
            <div class="col col-md-auto px-0 d-flex align-items-center">
              <div class="input-group">
               <div class="input-group-prepend">
                 <div class="input-group-text">Rp</div>
               </div>
               <input type="text" class="form-control-plaintext text-center" name="harga_total_barang" value="40000">
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-auto ml-auto">
          <button type="submit" class="btn bg--cream w-100 text-center float-right">Proceed Checkout</button>
        </div>
      </div>
    </form>
  </aside>
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
              <div class="product__action">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="0" value="0" required>
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
              <div class="product__action">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="0" value="0" required>
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
              <div class="product__action">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="0" value="0" required>
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
              <div class="product__action">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="0" value="0" required>
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
              <div class="product__action">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="0" value="0" required>
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
              <div class="product__action">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="0" value="0" required>
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
              <div class="product__action">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="0" value="0" required>
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
              <div class="product__action">
                <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                <input type="number" min="0" value="0" required>
                <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
              </div>
            </figcaption>
          </figure>
        </div>
      </form>
      <div class="row justify-content-center justify-content-md-end my-5">
        <button type="submit" form="shopCart" class="btn">Go To Shopping Chart <i class='bx bx-caret-right'></i></button>
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
      $(".btn-close").click(function() {
        $(this).parent().removeClass("show");
        $("body").removeClass("not-scroll");
      });
      $("#cartBtn").click(function() {
        $("aside").addClass("show");
        $("body").addClass("not-scroll");
      });
    });
  </script>
@endsection
