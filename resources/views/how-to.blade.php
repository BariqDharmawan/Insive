@extends('layouts.master')
@section('title', 'How To Order')
@section('body-id', 'howtoorder-page')
@section('css')
  <style>
    .col-12:last-child {
      padding-left: 20px;
      padding-right: 20px;
    }
    .col-12, .col-12 * {
      color: #F6E1B2;
    }
    .col-12:last-child div {
      position: relative;
    }
    .col-12:last-child img {
      max-width: 100%;
    }
  </style>
@endsection
@section('page-title', 'How To Order')
@section('content')
  <main>
    <div class="container">
      <div class="row">
        <div class="col-12 mb-4">
          {{ $howToOrder->header }}
        </div>
        <div class="col-12">
          {!! $howToOrder->isi !!}
        </div>
      </div>
    </div>
  </main>
@endsection
