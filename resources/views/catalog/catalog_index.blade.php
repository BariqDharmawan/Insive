@extends('layouts.master')
@section('title', 'Our Catalog')
@section('page-title', 'OUR CATALOG')
@section('body-id', 'catalog-page')
@section('content')
<aside>
    <h1 class="text--cream">Your Cart</h1>
    <a href="javascript:void(0);" class="btn btn-link text--cream btn-close"><i class='bx bx-x'></i></a>
    <form action="{{ route('home.catalog.store') }}" class="py-4" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-12">
                <div class="row mx-0 justify-content-between"></div> {{-- tambah element lwt js --}}
            </div>
            <div class="col-12"></div> {{-- tambah button submit lwt js --}}
        </div>
    </form>
</aside>
<main>
    <div class="container">
        <div class="row">
            @foreach ($product as $item)
            <div class="col-12 col-md-6 col-lg-3">
                <figure class="product">
                    <img src="{{ asset('img/product.png') }}" alt="Our Product">
                    <figcaption>
                        <p class="text--cream">{{$item->product_name}}</p>
                        <div class="product__price">
                            <span class="text--cream">Rp. </span>
                            <input type="hidden" name="product_id[]" value="{{$item->id}}">
                            <input type="number" class="input-price-cart" name="hargaproduct" data-price="{{$item->price}}" value="{{$item->price}}" readonly>
                        </div>
                        <div class="product__action">
                            <a href="javascript:void(0);" class="btn bg--cream"><i class='bx bx-plus'></i> Add To Cart</a>
                        </div>
                    </figcaption>
                </figure>
            </div>
            @endforeach
        </div>
        <div class="row mx-0 justify-content-center">
          {{ $product->links() }}
        </div>
    </div>
</main>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        //add to cart product only once
        $("main .product__action .btn").one('click', function() {
            var productnya = $(this).parents(".product").clone();
            $("aside .form-group .row").append(productnya);
            $("aside .form-group .row .product__action .btn").replaceWith('<a href="javascript:void(0);" class="product__button product__button--increase"><i class="bx bx-plus"></i></a><input type="number" name="jumlah_beli[]" min="1" value="1" required><a href="#" class="product__button product__button--decrease"><i class="bx bx-minus"></i></a>');
            $("aside .form-group .row .product figcaption").append('<a href="javascript:void(0);" class="btnRemove"><i class="bx bx-trash-alt"></i></a>')
            $("aside").addClass('show');
            $("header, footer, main").addClass("aside-showed");
            if ($("aside .form-row > div:last-child button").length === 0) {
                $("aside .form-row > div:last-child").append('<button type="submit" class="btn bg--cream w-100 text-center float-right">Proceed Checkout</button>');
            }
        });
        //remove per-product
        $(document).on('click', 'aside .product figcaption .btnRemove', function() {
            $(this).parents(".product").remove();
            //unbind one click that will make add to cart work again
            $("main .product__action .btn").unbind('click').one('click', function() {
                var productnya = $(this).parents(".product").clone();
                $("aside .form-group .row").append(productnya);
                $("aside .form-group .row .product__action .btn").replaceWith('<a href="javascript:void(0);" class="product__button product__button--increase"><i class="bx bx-plus"></i></a><input type="number" name="jumlah_beli" min="1" value="1" required><a href="#" class="product__button product__button--decrease"><i class="bx bx-minus"></i></a>');
                $("aside .form-group .row .product figcaption").append('<a href="javascript:void(0);" class="btnRemove"><i class="bx bx-trash-alt"></i></a>')
                $("aside").addClass('show');
                $("header, footer, main").addClass("aside-showed");
                if ($("aside .form-row > div:last-child button").length === 0) {
                    $("aside .form-row > div:last-child").append('<button type="submit" class="btn bg--cream w-100 text-center float-right">Proceed Checkout</button>');
                }
            });
        });
        //   $(document).on('keydown', 'aside .product .product__action input', function() {
            //     // var jumlahbeli = parseFloat($(this).val());
            //     $(this).parent().prev().find("input").data('value', $(this).parent().prev().find("input").val());
            //     var hargaawal = $(this).parent().prev().find("input").data("value");
            //     var hargabeli = hargaawal * $(this).val();
            //     $(this).parent().prev().find("input").val(hargabeli);
            //   });
            //tambahin jumlah beli
            defaultValue = 1;
            $(document).on('click', '.product__button--increase', function() {
                // $(this).next().trigger("keydown"); //inputan dianggap berubah value
                var input = $(this).parents('figcaption').find('.input-price-cart');
                var price = input.data('price');
                $(this).next('input').val(parseInt($(this).next('input').val(), 10) + 1);
                var final_price = price*$(this).next('input').val();
                input.val(final_price);
                defaultValue += parseInt($(this).next('input').val(), 10) + 1;
            });
            //kurangin jumlah beli
            $(document).on('click', '.product__button--decrease', function(){
                if ($(this).prev('input').val() > 1) {
                    var input = $(this).parents('figcaption').find('.input-price-cart');
                    var price = input.data('price');
                    $(this).prev('input').val(parseInt($(this).prev('input').val(), 10) - 1);
                    var final_price = price*$(this).prev('input').val();
                    input.val(final_price);
                    defaultValue += parseInt($(this).prev('input').val(), 10) - 1;
                }
                else {
                    $(this).prev('input').val(1);
                }
            });
            $(".btn-close").click(function() {
                $(this).parent().removeClass("show");
                $("header, footer, main").removeClass("aside-showed");
            });
            $("#cartBtn").click(function() {
                $("aside").toggleClass("show");
                $("header, footer, main").toggleClass("aside-showed");
            });
            //perkecil width element saat aside muncul
            $("aside.show").siblings("main, header, footer").addClass("aside-showed");
        });
    </script>
    @endsection
