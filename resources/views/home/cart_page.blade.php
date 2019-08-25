@extends('layouts.master')
@section('title', 'Your Custom Mask Cart')
@section('page-title', 'Your Custom Mask Cart')
@section('body-id', 'cart-page')
@section('css')
<style>
    .container-disabled {
        display: none;
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        z-index: 1000;
        background: rgba(57, 57, 57, 0.9);
    }
</style>
@endsection
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
        <div id="custom-package-page">
          <div id="custom-fragrance-page">
            <p class="text--cream px-2 px-lg-0 mb-5 my-lg-4 w-100 text-center text-lg-left">Package:</p>
            <div class="row mx-0 px-2 justify-content-between">
              @foreach ($price as $value)
              @if ($value->price_name == 'trial')
              @php
              $price_first = $value->price;
              @endphp
              <figure class="fragrance text-center col-6 py-3 col-lg-4" id="figure_pricing--trial" data-min="{{$value->min_qty}}" data-max="{{$value->max_qty}}" data-price="{{$value->price}}">
                <img src="{{ asset('img/package/trial.png') }}" height="100" width="100" alt="Trial">
                <figcaption class="text--cream">
                    <label class="m-0" for="pricing_trial"><var>{{$value->min_qty}}-{{$value->max_qty}} pcs</var> (Rp {{number_format($value->price, 0)}})​</label>
                </figcaption>
              </figure>
              @endif
              @if ($value->price_name == 'medium')
              <figure class="fragrance text-center col-6 py-3 col-lg-4" id="figure_pricing--medium" data-min="{{$value->min_qty}}" data-max="{{$value->max_qty}}" data-price="{{$value->price}}">
                <h2 class="text-center text--cream font-weight-bold">Medium <small class="d-block">Package</small></h2>
                <figcaption class="text--cream">
                    <label class="m-0" for="pricing_medium"><var>{{$value->min_qty}}-{{$value->max_qty}} pcs</var> ​<del>(Rp {{number_format($price_first, 0)}})</del> (Rp {{number_format($value->price, 0)}})​</label>
                </figcaption>
              </figure>
              @endif
              @if ($value->price_name == 'large')
              <figure class="fragrance text-center col-6 py-3 col-lg-4" id="figure_pricing--large" data-min="{{$value->min_qty}}" data-max="{{$value->max_qty}}" data-price="{{$value->price}}">
                <h2 class="text-center text--cream font-weight-bold">Large <small class="d-block">Package</small></h2>
                <figcaption class="text--cream">
                    <label class="m-0" for="pricing_large"><var> >{{$value->min_qty}} pcs</var> <del>(Rp {{number_format($price_first, 0)}})</del> (Rp {{number_format($value->price, 0)}})​</label>
                </figcaption>
              </figure>
              @endif
              @endforeach
            </div>
          </div>
        </div>
        <p class="text--cream px-2 px-lg-0 mb-5 my-lg-4 w-100 text-center text-lg-left">Qty:</p>
        <form id="nextCart" action="{{ route('home.cart.store') }}" onsubmit="return confirm('Are you sure?')" method="post">
          @csrf
          <ul class="product__action d-block">
              @foreach ($sub_cart as $value)
              <li class="py-1">
                  <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                  <input type="number" class="input_product--qty" name="qty_product[]" min="0" value="{{$value->qty}}" required>
                  <a href="#" class="product__button product__button--decrease"><i class='bx bx-minus'></i></a>
                  <div class="col px-0">
                      <input type="hidden" name="product_id[]" value="{{$value->id}}">
                      <select name="sheet_id[]" class="custom-select">
                          @foreach ($sheet as $item)
                          <option value="{{$item->id}}" {{($value->sheet_id == $item->id)? 'selected="selected"': ''}}>{{$item->sheet_name}}</option>
                          @endforeach
                      </select>
                      <i class='bx bx-chevron-down'></i>
                  </div>
                  <div class="col px-0">
                      <select name="fragrance_id[]" class="custom-select">
                          @foreach ($fragrance as $item)
                          <option value="{{$item->id}}" {{($value->fragrance_id == $item->id)? 'selected="selected"': ''}}>{{$item->fragrance_name}}</option>
                          @endforeach
                      </select>
                      <i class='bx bx-chevron-down'></i>
                  </div>
              </li>
              @endforeach
          </ul>
          <h6 class="float-right text--cream" id="total_price">Total price: (Rp 0)</h6>
        </form>
      </div>
    </div>
    <div class="row justify-content-center justify-content-lg-end py-5">
      <button type="submit" form="nextCart" class="btn bg--cream">
          <b>Next, </b> shipping address​ <i class='bx bx-caret-right'></i>
      </button>
    </div>
  </div>
</main>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        getPackageSelected();
        defaultValue = 1;
        $(".product__button").attr('href', 'javascript:void(0)');
        $(".product__button--increase").click(function(){
            $(this).next('input').val(parseInt($(this).next('input').val(), 10) + 1);
            defaultValue += parseInt($(this).next('input').val(), 10) + 1;
            getPackageSelected();
        });
        $(".product__button--decrease").click(function(){
          var newValue = parseInt($(this).prev('input').val(), 10) - 1;
          $(this).prev('input').val(parseInt($(this).prev('input').val(), 10) - 1);
          defaultValue += parseInt($(this).prev('input').val(), 10) - 1;
          getPackageSelected();
        });
    });
    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    };
    function getPackageSelected() {
        var trial = $('#figure_pricing--trial');
        var medium = $('#figure_pricing--medium');
        var large = $('#figure_pricing--large');
        var totalQty = 0;
        $(".input_product--qty").each(function(index) {
            var value = $(this).val();
            if(value > 0) {
                totalQty += parseInt(value);
            }
        });
        if(totalQty >= trial.data('min') && totalQty <= trial.data('max')) {
            $('figure.fragrance').removeClass('selected');
            trial.addClass('selected');
            var total_price = (totalQty*trial.data('price'));
            $('#total_price').text("Total price: ("+addCommas(total_price)+")");
        }
        else if(totalQty >= medium.data('min') && totalQty <= medium.data('max')) {
            $('figure.fragrance').removeClass('selected');
            medium.addClass('selected');
            var total_price = (totalQty*medium.data('price'));
            $('#total_price').text("Total price: ("+addCommas(total_price)+")");
        }
        else if(totalQty >= large.data('min')) {
            $('figure.fragrance').removeClass('selected');
            large.addClass('selected');
            var total_price = (totalQty*large.data('price'));
            $('#total_price').text("Total price: ("+addCommas(total_price)+")");
        }
        else if(totalQty == 0) {
            $(".input_product--qty:first").val(1);
            var total_price = (totalQty*trial.data('price'));
            $('#total_price').text("Total price: ("+addCommas(total_price)+")");
        }
    }
</script>
@endsection
