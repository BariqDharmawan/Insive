@extends('layouts.master')
@section('title', 'Invoice On Admin')
@section('body-id', 'order-today-page-admin')
@section('page-title')
  Today's Order
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row pt-4">
        <div class="col-12">
          <div class="accordion w-100" id="accordionExample">
            @foreach ($list_order as $order)
              <div class="card">
                <div class="card-header d-flex align-items-center" id="heading{{ $order->id }}">
                  <h2 class="mb-0">
                    <button class="btn bg--cream" type="button" data-toggle="collapse" data-target="#collapse{{ $order->id }}"
                    aria-expanded="@if($order->id == 1) true @else false @endif" aria-controls="collapse{{ $order->id }}">
                      {{ $order->user_id->name }}
                    </button>
                  </h2>
                  <var>{{ $order->total_qty . ' PCS' }}</var>
                </div>
                <div id="collapse{{ $order->id }}" class="collapse @if($order->id == 1) show @endif" aria-labelledby="heading{{ $order->id }}"
                data-parent="#accordionExample">
                  <div class="card-body row mx-0">
                    <div class="mb-4 col-12 px-0">
                      <p class="mb-0">Formula Code: {{ $order->formula_code }}</p>
                      <p class="mb-0">Acne​</p>
                    </div>
                    <ul class="col-12 px-0">
                      @if ($order->type_cart == 'custom')
                        @foreach ($order->item as $item)
                          <li>
                            <span>Sheet Type: {{ $item->sheet_name }}</span>
                            <span>Fragrance Type: {{ $item->fragrance_name }}</span>
                            <var class="float-md-right">{{ $item->qty . ' PCS' }}</var>
                          </li>
                        @endforeach
                      @elseif ($order->type_cart == 'catalog')
                        @foreach ($order->item as $item)
                          <li>
                            <span>Product Name: {{ $item->product_name }}</span>
                            <span>Category: {{ $item->category }}</span>
                            <var class="float-md-right">{{ $item->qty . ' PCS' }}</var>
                          </li>
                        @endforeach
                      @endif
                    </ul>
                    <ul class="col-12 px-0">
                      <li class="bg--cream"><a href="{{ route('admin.recipe.all') }}" class="text-dark"><i class='bx bxs-printer'></i> Print Recipe & Invoice​</a></li>
                      <li class="bg--cream"><a href="" class="text-dark"><i class='bx bx-sync' ></i> Update status order​</a></li>
                      <li class="bg--cream"><a href="" class="text-dark"><i class='bx bxs-truck' ></i> Input tracking number​</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
