@extends('temp.main')
@section('title-page', 'Insive | Message Customer')
@section('title-body', 'Message From Customer')
@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <style media="screen">
    .pagination {
      margin-bottom: 0;
    }
  </style>
@endsection
@section('content')
  <div class="col-12">
    @if(count($contactUs) > 0)
      <div class="accordion" id="accordionFaq">
        @foreach ($contactUs as $pesan)
          <div class="card">
            <div class="card-header" id="heading{{ $pesan->id }}">
              <h2 class="mb-0 d-flex justify-content-between align-items-center">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $pesan->id }}"
                  aria-expanded="@if ($pesan->id == 1) true @endif" aria-controls="collapse{{ $pesan->id }}">
                  Dari Customer Bernama {{ $pesan->nama_customer }}
                </button>
                <form action="{{ route('admin.pesan-dari-customer.destroy', $pesan->id) }}" method="post">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-link text-danger"><i class="fas fa-trash"></i></button>
                </form>
              </h2>
            </div>
            <div id="collapse{{ $pesan->id }}" class="collapse @if ($pesan->id == 1) show @endif"
              aria-labelledby="heading{{ $pesan->id }}" data-parent="#accordionFaq">
              <div class="card-body">
                {!! $pesan->pesan !!}
              </div>
              <div class="card-footer">
                <form action="{{ route('admin.pesan-dari-customer.store') }}" method="post">
                  @csrf
                  <input type="hidden" name="from_customer" value="{{ $pesan->email_customer }}">
                  <textarea name="balasan" rows="8" class="form-control" placeholder="Balasan"></textarea>
                  <button type="submit" class="btn btn-success mt-3">Balas Ke Email Customer</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="alert alert-secondary text-center">
        Nothing
      </div>
    @endif
  </div>
  <div class="col-12 d-flex align-items-center justify-content-between">
    {{ $contactUs->links() }}
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
