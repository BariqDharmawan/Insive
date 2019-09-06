@extends('layouts.master')
@section('title', 'Invoice On Admin')
@section('body-id', 'invoice-page-admin')
@section('page-title')
  Invoice Backend <br> Admin
@endsection
@section('css')
  <style media="screen">
    main .container > .row > .col-12 ~ .col-12 {
      margin-top: 30px;
    }
    main .container > .row > .col-12 + button {
      border-radius: 0 0 .25rem .25rem;
    }
  </style>
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row mx-0 pt-5">
        @foreach ($list_order as $order)
          <div class="col-12 text-white">
            <p class="font-weight-bold">INSIVE​</p>
            <time class="font-weight-bold">{{ $order->created_at }}</time>
            <ul>
              <li>Customer Name : <span>{{ $order->user_id->name }}</span></li>
              <li>Formula Code : <span>{{ $order->formula_code }}</span></li>
              <li>Special Ingredients : <span>Salicylic acid & lemon stem extract​</span></li>
              <li>Total Price  : <var>{{ 'Rp ' . $order->total_price }} ( exclude shipping cost {{ 'Rp ' . $order->shipping_cost }} )</var></li>
              <li>Address :<address>{{ $order->user_id->address }}</address></li>
            </ul>
          </div>
          <button type="button" class="btn w-100 bg--cream printBtn">Print</button>
        @endforeach
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
