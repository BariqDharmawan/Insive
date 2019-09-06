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
  </style>
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row">
        <form action="{{ route('admin.search.invoice-recipe') }}" class="col-12" method="get">
          <input type="search" class="form-control bg-transparent text--cream" name="find_invoice"
          placeholder="Find formula code, customer name (example: Bariq Dharmawan)" autocomplete="off">
          <button type="submit" class="btn bg--cream">Search</button>
        </form>
      </div>
      <div class="row mx-0 pt-5">
        @if (count($find) > 0)
          @foreach ($find as $result)
            <div class="col-12 py-3 text-white">
              <p class="font-weight-bold">INSIVE​</p>
              <time class="font-weight-bold">{{ $result->created_at }}</time>
              <ul>
                <li>
                  Customer Name :
                  <span>{{ $result->getCustomer->name }}</span>
                </li>
                <li>
                  Formula Code :
                  <span>{{ $result->formula_code }}</span>
                </li>
                <li>
                  Special Ingredients :
                  <span>Salicylic acid & lemon stem extract​</span>
                </li>
                <li>
                  Total Price :
                  <var>{{ 'Rp ' . $result->total_price }} ( exclude shipping cost {{ 'Rp ' . $result->shipping_cost }} )</var>
                </li>
                <li>
                  Address :
                  <address>{{ $result->getCustomer->address }}</address>
                </li>
              </ul>
            </div>
            <button type="button" class="btn w-100 bg--cream printBtn">Print</button>
          @endforeach
        @else
          <p class="text--cream text-center w-100 h5">
            No Result !
            <a href="{{ url()->previous() }}" class="d-flex align-items-center justify-content-center mt-2 text-warning">
              <i class='bx bx-left-arrow-alt'></i>
              Back To Previous
            </a>
          </p>
        @endif
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
