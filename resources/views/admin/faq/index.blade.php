@extends('temp.main')
@section('title-page', 'Insive | Faq Page')
@section('title-body', 'Frequently Ask Question')
@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <style media="screen">
    .pagination {
      margin-bottom: 0;
    }
  </style>
@endsection
@section('content')
  @if (session('success_message'))
  <div class="col-12 message-session">
      <div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
          {{ session('success_message') }}
      </div>
  </div>
  @endif
  <div class="col-12">
    <div class="accordion" id="accordionFaq">
      @foreach ($faqs as $faq)
        <div class="card">
          <div class="card-header" id="heading{{ $faq->id }}">
            <h2 class="mb-0 d-flex justify-content-between align-items-center">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $faq->id }}"
                aria-expanded="@if ($faq->id == 1) true @endif" aria-controls="collapse{{ $faq->id }}">
                {{ $faq->pertanyaan }}
              </button>
              <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="post">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-link text-danger"><i class="fas fa-trash"></i></button>
              </form>
            </h2>
          </div>
          <div id="collapse{{ $faq->id }}" class="collapse @if ($faq->id == 1) show @endif"
            aria-labelledby="heading{{ $faq->id }}" data-parent="#accordionFaq">
            <div class="card-body">
              {!! $faq->isi !!}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <div class="col-12 d-flex align-items-center justify-content-between">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-faq">
      Add New Faq
    </button>
    <div class="modal fade" id="modal-add-faq">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h4 class="modal-title">Add New Faq</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.faq.store') }}" id="formAddFaq" method="post">
              @csrf
              <div class="form-group">
                <input class="form-control" name="pertanyaan" type="text" placeholder="Judul Pertanyaan" autocomplete="off" required>
              </div>
              <div class="form-group">
                <textarea class="textarea" name="isi" placeholder="Isi Pertanyaan" required></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer justify-content-end">
            <button type="submit" form="formAddFaq" class="btn btn-success">Add New Faq</button>
          </div>
        </div>
      </div>
    </div>
    {{ $faqs->links() }}
  </div>
@endsection
@section('script')
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.message-session').delay(3000).slideUp(600);
      $('.textarea').summernote({
        minHeight: 200
      })
    });
  </script>
@endsection
