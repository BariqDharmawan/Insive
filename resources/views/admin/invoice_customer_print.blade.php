@extends('layouts.master_print')
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
    .border-warning-custom {
        border: 1px solid #ffc107 !important;
    }
    button[type='submit'] {
        position: absolute;
        height: 45px;
        right: 0;
        top: 0;
    }
</style>
@endsection
@section('content')
<main>
    <div class="container">
        <div class="row mx-0 pt-5">
            <div class="col-12 py-3 text-warning border-warning">
                <p class="font-weight-bold">INSIVE​</p>
                <time class="font-weight-bold">({{ date_format($list_order->created_at, 'd-m-Y') }})</time>
                <ul>
                    <li>Customer Name : <span>{{ $list_order->user->name }}</span></li>
                    <li>Formula Code : <span>{{ $list_order->formula_code }}</span></li>
                    @if (!empty($list_order->logic))
                    <li>Special Ingredients : <span>{{$list_order->logic->special_ingredients}}​</span></li>
                    @endif
                    <li>Total Price  : <var>{{ 'Rp ' . $list_order->total_price }} ( exclude shipping cost {{ 'Rp ' . $list_order->shipping_cost }} )</var></li>
                    <li class="border-warning-custom" style="height: 2px;"><br></li>
                    <li>To :<span>{{ $list_order->shipping->name }}</span></li>
                    <li>Phone :<span>{{ $list_order->shipping->phone }}</span></li>
                    <li>Address :<address>{{ $list_order->shipping->address }}</address></li>
                </ul>
            </div>
            @if ($list_order->type_cart == 'custom')
            @foreach ($list_order->item as $item)
            <div class="col-6 my-3">
                <div class="col-12 text-warning border-warning">
                    <ul>
                        <li>Customer Name : <span>{{ $list_order->user->name }}</span></li>
                        <li>Formula Code : <span>{{ $list_order->formula_code }}</span></li>
                        <li>Special Ingredients : <span>Salicylic acid & lemon stem extract​</span></li>
                        <li class="border-warning-custom" style="height: 2px;"><br></li>
                        <li>Sheet Type / Fragrance :</span></li>
                        <li><span>{{ $item->sheet_name.' / '.$item->fragrance_name.' ('.$item->qty.')' }}</span></li>
                    </ul>
                </div>
            </div>
            @endforeach
            @elseif($list_order->type_cart == 'catalog')
            @foreach ($list_order->item as $item)
            <div class="col-6 my-3">
                <div class="col-12 text-warning border-warning">
                    <ul>
                        <li>Customer Name : <span>{{ $list_order->user->name }}</span></li>
                        <li>Formula Code : <span>{{ $list_order->formula_code }}</span></li>
                        <li>Special Ingredients : <span>Salicylic acid & lemon stem extract​</span></li>
                        <li class="border-warning-custom" style="height: 2px;"><br></li>
                        <li>Catalog :</span></li>
                        <li><span>{{ $item->product_name.' ('.$item->qty.')' }}</span></li>
                    </ul>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</main>
@endsection
@section('script')
<script src="{{ asset('plugins/printarea/jquery.PrintArea.js') }}" charset="utf-8"></script>
<script>
    $(document).ready(function(e) {
        window.print();
    });
</script>
@endsection
