@extends('layouts.master')
@section('title', 'Invoice On Admin')
@section('body-id', 'invoice-page-admin')
@section('page-title')
Invoice Backend <br> Admin
@endsection
@section('css')
<style media="all">
    main .container > .row > .col-12 ~ .col-12 {
        margin-top: 30px;
    }
    main .container > .row > .col-12 + button {
        border-radius: 0 0 .25rem .25rem;
    }
    input[type='search'] {
        height: 45px;
        border: 1px solid #E2CCC1;
        padding-right: calc(.75rem + 76.7px);
    }
    input[type='search']:focus {
        color: #d6c1b6;
    }
    button[type='submit'] {
        position: absolute;
        height: 45px;
        right: 0;
        top: 0;
    }
    /* @media print {
        .bg-black {
            position: relative;
            overflow: hidden; /* this might not work well in all situations */
        }
        .bg-black:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            /* and here it is, the background color */
            border: 99999px black solid;
            z-index: 0; /* was required in my situation */
        }
        .bg-black * {
            /* was required in my situation */
            position: relative;
            z-index: 1;
        }
    } */
</style>
@endsection
@section('content')
<main>
    <div class="container bg-black">
        <div class="row mx-0 pt-5">
            <div class="col-12 py-3 text-white" style="color:white;">
                <p class="font-weight-bold">INSIVE​</p>
                <time class="font-weight-bold">({{ date_format($list_order->created_at, 'd-m-Y') }})</time>
                <ul>
                    <li>Customer Name : <span>{{ $list_order->user->name }}</span></li>
                    <li>Formula Code : <span>{{ $list_order->formula_code }}</span></li>
                    <li>Special Ingredients : <span>Salicylic acid & lemon stem extract​</span></li>
                    <li>Total Price  : <var>{{ 'Rp ' . $list_order->total_price }} ( exclude shipping cost {{ 'Rp ' . $list_order->shipping_cost }} )</var></li>
                    <li class="bg-white" style="height: 2px;"><br></li>
                    <li>To :<span>{{ $list_order->shipping->name }}</span></li>
                    <li>Phone :<span>{{ $list_order->shipping->phone }}</span></li>
                    <li>Address :<address>{{ $list_order->shipping->address }}</address></li>
                </ul>
            </div>
            <button type="button" class="btn w-100 bg--cream printBtn d-print-none">Print</button>
        </div>
    </div>
</main>
@endsection
@section('script')
<script src="{{ asset('plugins/printarea/jquery.PrintArea.js') }}" charset="utf-8"></script>
<script>
    $(document).ready(function(e) {
        $(".printBtn").bind("click", function(event) {
            $(this).prev(".col-12").printArea();
        });
    });
</script>
@endsection
