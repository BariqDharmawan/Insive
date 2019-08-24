@extends('temp.main')
@section('title-page', 'Insive | Admin - Create Page')
@section('title-body', 'How To Order Create')
@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <style media="screen">
    .col-12 .alert-info {
      background-color: #d1ecf1 !important;
      border-color: #bee5eb !important;
      color: #0c5460 !important;
    }
    .col-12 .alert-info .alert-link {
      color: #062c33 !important;
    }
  </style>
@endsection
@section('content')
  <div class="col-12">
    @empty ($howToOrder)
      <form action="{{ route('admin.how-to-order.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="headerCaption">Header Caption</label>
          <textarea class="form-control" name="headerContent" id="headerCaption"
          rows="4" placeholder="Type Header Caption Here"></textarea>
        </div>
        <div class="form-group">
          <label for="how-to-content">Content</label>
          <textarea class="how-to-content" name="mainContent"
          id="how-to-content" placeholder="Put Content Here"></textarea>
        </div>
        <button type="submit" class="btn btn-success mb-3">Save</button>
      </form>
    @endempty
    @isset($howToOrder)
      <div class="alert alert-info text-center" role="alert">
        You Can't Create A New How-To-Order Again. Please remove the old one,
        or just <a href="{{ route('admin.how-to-order.edit', $howToOrder->id) }}" class="alert-link">update</a> it
      </div>
    @endisset
  </div>
@endsection
@section('script')
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.how-to-content').summernote({
        height: 200
      });
    });
  </script>
@endsection
