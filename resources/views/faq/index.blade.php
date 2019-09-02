@extends('layouts.master')
@section('title', 'Frequently Ask Questioin')
@section('page-title', 'Faq')
@section('body-id', 'faq-page')
@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <style media="screen">
    main {
      min-height: calc(100% - 65px - 60px - 110px);
    }
    .card {
      background-color: #1e1e1e;
    }
    .page-item.disabled .page-link {
      border-color: #1e1e1e;
      background-color: #1e1e1e;
      color: rgba(246,225,178,.4);
    }
    .page-item.active .page-link {
      background-color: #E2CCC1;
      color: #1e1e1e;
      border-color: #1e1e1e;
    }
    .page-link:hover {
      color: #d1baaf;
      border-color: #171717;
      background-color: #171717;
    }
    .page-link {
      border-color: transparent;
      background-color: #1e1e1e;
      color: #E2CCC1;
    }
  </style>
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row">
        @if (Session::has('success_message'))
          <div class="alert alert-success" role="alert">
            {{ Session::get('success_message') }}
          </div>
        @endif
        <div class="col-12">
          <div class="accordion" id="accordionFaq">
            @foreach ($faqs as $faq)
              <div class="card">
                <div class="card-header" id="heading{{ $faq->id }}">
                  <h2 class="mb-0 d-flex justify-content-between align-items-center">
                    <button class="btn btn-link text--cream" type="button" data-toggle="collapse" data-target="#collapse{{ $faq->id }}"
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
                  <div class="card-body bg--cream">
                    {!! $faq->isi !!}
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="col-12 py-4 d-flex align-items-center justify-content-between">
          {{ $faqs->links() }}
        </div>
      </div>
    </div>
  </main>
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
