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
        border: 1px solid #E2CCC1 !important;
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
            <div class="col-12 py-3 text--cream border-warning-custom">
                <p class="font-weight-bold">INSIVE​</p>
                <time class="font-weight-bold">({{ date_format($list_order->created_at, 'd-m-Y') }})</time>
                <ul>
                    <li>Customer Name : <span>{{ $list_order->user->name }}</span></li>
                    <li>Formula Code : <span>{{ $list_order->formula_code }}</span></li>
                    @if (!empty($list_order->logic))
                    <li>Special Ingredients : <span>{{$list_order->logic->special_ingredients}}​</span></li>
                    @endif
                    <li>
                      Total Price  :
                      <var>@currency($list_order->total_price) ( exclude shipping cost @currency($list_order->shipping_cost) )</var>
                    </li>
                    <li class="border-warning-custom" style="height: 2px;"><br></li>
                    <li>To :<span>{{ $list_order->shipping->name }}</span></li>
                    <li>Phone :<span>{{ $list_order->shipping->phone }}</span></li>
                    <li>Address :<address>{{ $list_order->shipping->address }}</address></li>
                </ul>
            </div>
            @if ($list_order->type_cart == 'custom')
            @foreach ($list_order->item as $item)
            <div class="col-6 my-3">
                <div class="col-12 text--cream border-warning-custom">
                    <ul>
                        <li>Customer Name : <span>{{ $list_order->user->name }}</span></li>
                        <li>Formula Code : <span>{{ $list_order->formula_code }}</span></li>
                        <li>Special Ingredients : <span>{{$list_order->logic->special_ingredients}}​</span></li>
                        <li>Total Price : <span>@currency($item->total_price)​</span></li>
                        <li class="border-warning-custom" style="height: 2px;"><br></li>
                        @if ($item->sheet_name != null)
                            <li>Sheet Mask :</span></li>
                            <li><span>{{ $item->sheet_name.' ('.$item->qty.')' }}</span></li>
                        @elseif($item->fragrance_name != null)
                            <li>Serum :</span></li>
                            <li><span>{{ $item->fragrance_name.' ('.$item->qty.')' }}</span></li>
                        @endif
                    </ul>
                </div>
            </div>
            @endforeach
            @elseif($list_order->type_cart == 'catalog')
            @foreach ($list_order->item as $item)
            <div class="col-6 my-3">
                <div class="col-12 text--cream border-warning-custom">
                    <ul>
                        <li>Customer Name : <span>{{ $list_order->user->name }}</span></li>
                        <li>Formula Code : <span>{{ $list_order->formula_code }}</span></li>
                        <li>Total Price : <span>@currency($item->total_price)</span></li>
                        <li class="border-warning-custom" style="height: 2px;"><br></li>
                        <li>Catalog :</span></li>
                        <li><span>{{ $item->product_name.' ('.$item->qty.')' }}</span></li>
                    </ul>
                </div>
            </div>
            @endforeach
            @endif
            <a href="{{ route('admin.order.all') }}" class="btn bg--cream col-12">
              <i class='bx bx-arrow-back mr-2'></i>
              Back To Order List
            </a>
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
