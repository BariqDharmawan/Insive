@extends('layouts.master')
@section('title', 'Our Catalog')
@section('page-title', 'OUR CATALOG')
@section('body-id', 'catalog-page')
@section('css')
<style>
    .real--price {
        text-decoration: line-through;
        color: #c21717;    
    }
    .real--price:hover {
        color: #c21717;
    }
</style>
@endsection
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
                        <span class="text--cream text--price real--price" style="min-width:100px;">(Rp. {{number_format($item->price, 0)}})</span>
                        <div class="product__price">
                            <span class="text--cream text--price" style="min-width:100px;">Rp. {{number_format($item->price, 0)}}</span>
                            <input type="hidden" name="product_id[]" value="{{ $item->id }}">
                            <input type="number" class="input-price-cart" style="display: none" name="hargaproduct" data-price="{{$item->price}}" value="{{$item->price}}" readonly>
                        </div>
                        <div class="product__action">
                            <a href="javascript:void(0);" class="btn bg--cream">
                                <i class='bx bx-plus'></i> 
                                Add To Cart
                            </a>
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
            
            let productnya = $(this).parents(".product").clone();
            
            $("aside .form-group .row").append(productnya);
            $("aside .form-group .row .product__action .btn").replaceWith(
            '<a href="javascript:void(0);" class="product__button product__button--increase">' +
                '<i class="bx bx-plus"></i>' +
                '</a>' +
                '<input type="number" name="jumlah_beli[]" min="1" value="1" required readonly>' +
                '<a href="#" class="product__button product__button--decrease">' +
                    '<i class="bx bx-minus"></i>' +
                    '</a>'
                    );
                    $("aside .form-group .row .product figcaption").append(
                    '<a href="javascript:void(0);" class="btnRemove">' +
                        '<i class="bx bx-trash-alt"></i>' +
<<<<<<< HEAD
                        '</a>'
                        );
                        $("aside").addClass('show');
                        $("header, footer, main").addClass("aside-showed");
                        
                        if ($("aside .form-row > div:last-child button").length === 0) {
                            $("aside .form-row > div:last-child").append(
                            '<button type="submit" class="btn bg--cream w-100 text-center float-right">' +
                                'Proceed Checkout' +
                                '</button>'
                                );
                            }
                        });
                        
                        //remove per-product
                        $(document).on('click', 'aside .product figcaption .btnRemove', function() {
                            $(this).parents(".product").remove();
                            
                            $("main .product__action .btn").unbind('click').one('click', function() {
                                let productnya = $(this).parents(".product").clone();
                                
                                $("aside .form-group .row").append(productnya);
                                $("aside .form-group .row .product__action .btn").replaceWith(
                                '<a href="javascript:void(0);" class="product__button product__button--increase">' +
                                    '<i class="bx bx-plus"></i>' +
                                    '</a>' +
                                    '<input type="number"'+ 'name="jumlah_beli" min="1" value="1" required readonly>' +
                                    '<a href="#" class="product__button" product__button--decrease">' +
                                        '<i class="bx bx-minus"></i>' +
                                        '</a>'
                                        );
                                        $("aside .form-group .row .product figcaption").append(
                                        '<a href="javascript:void(0);" class="btnRemove">' +
                                            '<i class="bx bx-trash-alt"></i>' +
                                            '</a>'
                                            );
                                            $("aside").addClass('show');
                                            $("header, footer, main").addClass("aside-showed");
                                            if ($("aside .form-row > div:last-child button").length === 0) {
                                                $("aside .form-row > div:last-child").append(
                                                '<button type="submit" class="btn bg--cream w-100 text-center float-right">' +
                                                    'Proceed Checkout' +
                                                    '</button>'
                                                    );
                                                }
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
                                        
                                        //tambahin jumlah beli
                                        defaultValue = 1;
                                        $(document).on('click', '.product__button--increase', function () {
                                            // $(this).next().trigger("keydown"); //inputan dianggap berubah value
                                            let input = $(this).parents('figcaption').find('.input-price-cart');
                                            let span = $(this).parents('figcaption').find('.text--price');
                                            let price = input.data('price');
                                            $(this).next('input').val(parseInt($(this).next('input').val(), 10) + 1);
                                            let final_price = price * $(this).next('input').val();
                                            input.val(final_price);
                                            span.text("Rp. " + addCommas(final_price));
                                            defaultValue += parseInt($(this).next('input').val(), 10) + 1;
                                        });
                                        
                                        //kurangin jumlah beli
                                        $(document).on('click', '.product__button--decrease', function () {
                                            if ($(this).prev('input').val() > 1) {
                                                let input = $(this).parents('figcaption').find('.input-price-cart');
                                                let span = $(this).parents('figcaption').find('.text--price');
                                                let price = input.data('price');
                                                $(this).prev('input').val(parseInt($(this).prev('input').val(), 10) - 1);
                                                let final_price = price * $(this).prev('input').val();
                                                input.val(final_price);
                                                span.text("Rp. " + addCommas(final_price));
                                                defaultValue += parseInt($(this).prev('input').val(), 10) - 1;
                                            } else {
                                                $(this).prev('input').val(1);
                                            }
                                        });
                                        $(".btn-close").click(function () {
                                            $(this).parent().removeClass("show");
                                            $("header, footer, main").removeClass("aside-showed");
                                        });
                                        $("#cartBtn").click(function () {
                                            $("aside").toggleClass("show");
                                            $("header, footer, main").toggleClass("aside-showed");
                                        });
                                        
                                        //perkecil width element saat aside muncul
                                        $("aside.show").siblings("main, header, footer").addClass("aside-showed");
                                        
                                    });
                                </script>
                                @endsection
                                
=======
                    '</a>'
                );
                $("aside").addClass('show');
                $("header, footer, main").addClass("aside-showed");
                if ($("aside .form-row > div:last-child button").length === 0) {
                    $("aside .form-row > div:last-child").append(
                        '<button type="submit" class="btn bg--cream w-100 text-center float-right">' +
                            'Proceed Checkout' +
                        '</button>'
                    );
                }
            });
        });

        //tambahin jumlah beli
        defaultValue = 1;
        $(document).on('click', '.product__button--increase', function () {
            // $(this).next().trigger("keydown"); //inputan dianggap berubah value
            let input = $(this).parents('figcaption').find('.input-price-cart');
            let price = input.data('price');
            $(this).next('input').val(parseInt($(this).next('input').val(), 10) + 1);
            let final_price = price * $(this).next('input').val();
            input.val(final_price);
            defaultValue += parseInt($(this).next('input').val(), 10) + 1;
        });
        
        //kurangin jumlah beli
        $(document).on('click', '.product__button--decrease', function () {
            if ($(this).prev('input').val() > 1) {
                let input = $(this).parents('figcaption').find('.input-price-cart');
                let price = input.data('price');
                $(this).prev('input').val(parseInt($(this).prev('input').val(), 10) - 1);
                let final_price = price * $(this).prev('input').val();
                input.val(final_price);
                defaultValue += parseInt($(this).prev('input').val(), 10) - 1;
            } else {
                $(this).prev('input').val(1);
            }
        });
        
        $(".btn-close").click(function () {
            $(this).parent().removeClass("show");
            $("header, footer, main").removeClass("aside-showed");
        });
        $("#cartBtn").click(function () {
            $("aside").toggleClass("show");
            $("header, footer, main").toggleClass("aside-showed");
        });
        
        //perkecil width element saat aside muncul
        $("aside.show").siblings("main, header, footer").addClass("aside-showed");

    });
    </script>
    @endsection
>>>>>>> f6cfd00ed4bef7befee48fdfb6acdfc2666e8e47
