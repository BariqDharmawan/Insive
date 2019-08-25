@extends('layouts.master')
@section('title', 'Your Cart')
@section('page-title', 'Your Cart')
@section('body-id', 'cart-page')
@section('content')
  <main>
    <div class="container py-5">
      <div class="row">
        <div class="col-12 col-lg-4">
          <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
        </div>
        <div class="col-12 col-lg-8 d-flex d-lg-block flex-wrap justify-content-center">
          <p class="bg--cream my-4 my-lg-2 py-1 px-2 d-lg-inline-block">
            Formula Code: <var class="font-weight-bold">#02139</var>
          </p>
          <p class="text--cream px-2 px-lg-0 mb-3 my-lg-4 w-100 text-center text-lg-left">Qty:</p>
          <form id="nextCart" action="index.html" method="post">
            <ul class="product__action">
              <li>
                <div class="increase_number">
                  <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                  <input type="number" min="1" value="1" required>
                  <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
                </div>
                <div class="col px-0">
                  <select name="" class="custom-select">
                    <option value="super silk" selected>Super silk</option>
                    <option value="Coconut ​bio-cellulose">Coconut ​bio-cellulose</option>
                    <option value="activated charcoal​">Activated charcoal​</option>
                    <option value="panda animal printed​">Panda animal printed​</option>
                    <option value="sheep animal printed​">Sheep animal printed​</option>
                  </select>
                  <i class='bx bx-chevron-down'></i>
                </div>
                <div class="col px-0">
                  <select name="" class="custom-select">
                    <option value="coffee​" selected>Coffee​</option>
                    <option value="rose​">Rose​</option>
                    <option value="strawberry​">Strawberry​</option>
                    <option value="unscented​">Unscented​</option>
                  </select>
                  <i class='bx bx-chevron-down'></i>
                </div>
              </li>
              <li>
                <div class="increase_number">
                  <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                  <input type="number" min="1" value="1" required>
                  <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
                </div>
                <div class="col px-0">
                  <select name="" class="custom-select">
                    <option value="super silk">Super silk</option>
                    <option value="Coconut ​bio-cellulose" selected>Coconut ​bio-cellulose</option>
                    <option value="activated charcoal​">Activated charcoal​</option>
                    <option value="panda animal printed​">Panda animal printed​</option>
                    <option value="sheep animal printed​">Sheep animal printed​</option>
                  </select>
                  <i class='bx bx-chevron-down'></i>
                </div>
                <div class="col px-0">
                  <select name="" class="custom-select">
                    <option value="coffee​">Coffee​</option>
                    <option value="rose​">Rose​</option>
                    <option value="strawberry​" selected>Strawberry​</option>
                    <option value="unscented​">Unscented​</option>
                  </select>
                  <i class='bx bx-chevron-down'></i>
                </div>
              </li>
              <li>
                <div class="increase_number">
                  <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                  <input type="number" min="1" value="1" required>
                  <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
                </div>
                <div class="col px-0">
                  <select name="" class="custom-select">
                    <option value="super silk">Super silk</option>
                    <option value="Coconut ​bio-cellulose" selected>Coconut ​bio-cellulose</option>
                    <option value="activated charcoal​">Activated charcoal​</option>
                    <option value="panda animal printed​">Panda animal printed​</option>
                    <option value="sheep animal printed​">Sheep animal printed​</option>
                  </select>
                  <i class='bx bx-chevron-down'></i>
                </div>
                <div class="col px-0">
                  <select name="" class="custom-select">
                    <option value="coffee​">Coffee​</option>
                    <option value="rose​">Rose​</option>
                    <option value="strawberry​">Strawberry​</option>
                    <option value="unscented​" selected>Unscented​</option>
                  </select>
                  <i class='bx bx-chevron-down'></i>
                </div>
              </li>
            </ul>
          </form>
        </div>
      </div>
      <div class="row justify-content-center justify-content-lg-end py-5">
        <button type="submit" form="nextCart" class="btn bg--cream">
          <b>Next, </b> choose your mask type​ <i class='bx bx-caret-right'></i>
        </button>
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
