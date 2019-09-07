@extends('layouts.master')
@section('title', 'Invoice On Admin')
@section('body-id', 'recipe-page-admin')
@section('page-title')
  Recipe Backend <br> Admin
@endsection
@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/printarea/PrintArea.css') }}" media="print">
  <style media="all">
    .card {
      background-color: #141313;
      padding: 30px;
      border: 1px solid #E2CCC1;
    }
    main .container > .row > .col-12 button {
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
  </style>
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row">
        <form action="{{ route('admin.search.invoice-recipe') }}" class="col-12" method="get">
          @csrf
          <input type="search" class="form-control bg-transparent text--cream" name="find_recipe"
          placeholder="Find formula code (example: #01234)" autocomplete="off">
          <button type="submit" class="btn bg--cream">Search</button>
        </form>
      </div>
      <div class="row pt-5 justify-content-between">
        @foreach ($list_order as $order)
          <div class="col-12 col-md-5">
            <div class="card bg-transparent p-0" style="color: yellow">
              <div>
                <p>Customer Name: {{ $order->user_id->name }}</p>
                <p>Formula Code : {{ $order->formula_code }}</p>
                <p>Special ingredients: Salicylic acid & lemon stem extract​</p>
              </div>
              <div>
                @if ($order->type_cart == 'custom')
                  <p class="mb-0">Sheet Type / Fragrance: <span>{{ $order->sheet_name }} / {{ $order->fragrance_name }}</span></p>
                @else
                  <p class="mb-0 text-capitalize">Type Cart: {{ $order->type_cart }}</p>
                @endif
              </div>
            </div>
            <button type="button" class="btn w-100 bg--cream printBtn">Print</button>
          </div>
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
        $(this).prev(".card").printArea();
      });
    });
  </script>
@endsection
