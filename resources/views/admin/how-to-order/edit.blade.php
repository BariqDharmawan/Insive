@extends('template.main')

@section('title-page', $titlePage)

@section('title-body', $titlePage)

@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
  <div class="col-12">
    <form action="{{ route('admin.how-to-order.update', $editHowToOrder->id) }}" method="post">
      @csrf @method('PUT')
      <div class="form-group">
        <label for="headerCaption">Header Caption</label>
        <textarea class="form-control" name="headerContent" id="headerCaption"
        rows="4" placeholder="Type Header Caption Here">{{ $editHowToOrder->header }}</textarea>
      </div>
      <div class="form-group">
        <label for="how-to-content">Content</label>
        <textarea class="how-to-content" name="mainContent"
        id="how-to-content" placeholder="Put Content Here">{{ $editHowToOrder->isi }}</textarea>
      </div>
      <button type="submit" class="btn btn-success">Update All</button>
    </form>
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
