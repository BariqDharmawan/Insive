@extends('temp.main')
@section('title-page', 'Insive | Admin - Index Page')
@section('title-body', 'How To Order Index')
@section('css')
  <style media="screen">
    .col-12:last-child {
      padding-left: 20px;
      padding-right: 20px;
    }
    .col-12:last-child div {
      position: relative;
    }
    .col-12:last-child img {
      max-width: 100%;
    }
    #editContent {
      position: absolute;
      right: 10px;
      top: 0;
    }
  </style>
@endsection
@section('content')
  <div class="col-12">
    @if (Session::has('success_message') || Session::has('failed_message'))
    <div class="col-12 message-session">
      <div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
          {{ (Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message') }}
      </div>
    </div>
    @endif
  </div>
  <div class="col-12">
    @isset($howToOrder)
      <a href="{{ route('admin.how-to-order.edit', $howToOrder->id) }}" title="edit this content" id="editContent"><i class="fas fa-edit"></i></a>
      <div class="mb-4">
        {{ $howToOrder->header }}
      </div>
      <div>
        {!! $howToOrder->isi !!}
      </div>
    @endisset
    @empty ($howToOrder)
      <div class="d-flex justify-content-center flex-wrap">
        <p class="mb-0 w-100 text-center mb-0">Nothing</p>
        <a href="{{ route('admin.how-to-order.create') }}" class="btn btn-link text-info">Create How To Order</a>
      </div>
    @endempty
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $(".message-session").delay(300).fadeOut("slow");
    });
  </script>
@endsection
