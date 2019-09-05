@extends('layouts.master')
@section('title', 'Invoice On Admin')
@section('body-id', 'invoice-page-admin')
@section('page-title')
  Invoice Backend <br> Admin
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row mx-0 pt-5">
        @foreach ($list_order as $order)
          <div class="col-12">
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
        @endforeach
      </div>
      {{-- <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul> --}}
    </div>
  </main>
@endsection
