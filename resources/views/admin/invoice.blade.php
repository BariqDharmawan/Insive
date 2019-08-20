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
        <div class="col-12">
          <p class="font-weight-bold">INSIVE​</p>
          <time class="font-weight-bold">(14/02/2019)</time>
          <ul>
            <li>Customer Name : <span>Cathy​</span></li>
            <li>Formula Code : <span>#02139​</span></li>
            <li>Special Ingredients : <span>Salicylic acid & lemon stem extract​</span></li>
            <li>Total Price  : <var>Rp 84,000​</var></li>
            <li>Address :<address>Jl. Kemakmuran Kebayoran Jaksel​</address></li>
          </ul>
        </div>
      </div>
      <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </div>
  </main>
@endsection
