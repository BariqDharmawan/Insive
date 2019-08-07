@extends('layouts.master')
@section('title', 'Your Custom Mask Cart')
@section('page-title', 'Your Custom Mask Cart')
@section('body-id', 'cart-page')
@section('content')
<main>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-4">
                <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
            </div>
            <div class="col-12 col-lg-8 d-flex d-lg-block flex-wrap justify-content-center">
                <p class="bg--cream my-4 my-lg-2 py-1 px-2 d-lg-inline-block">Formula Code: <var class="font-weight-bold">#02139</var></p>
                <p class="text--cream px-2 px-lg-0 mb-5 my-lg-4 w-100 text-center text-lg-left">Qty:</p>
                <form id="nextCart" action="{{ route('home.cart.store') }}" onsubmit="return confirm('Are you sure catchy?')" method="post">
                    @csrf
                    <ul class="product__action" style="display: block;">
                        @foreach ($sub_cart as $value)
                        <li class="py-1">
                            <a href="#" class="product__button product__button--increase"><i class='bx bx-plus' ></i></a>
                            <input type="number" name="qty_product[]" min="0" value="{{$value->qty}}" required>
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
