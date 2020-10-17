@extends('template.main')

@section('title-page', $titlePage)

@section('title-body', $titlePage)

@section('body-id', $titlePage)

@section('content')
<div class="col-12">
    <div class="accordion" id="accordionExample">
        @foreach ($messageCustomer as $message)
        <div class="card">
            <div class="card-header" id="heading{{ $message->id }}">
                <h2 class="mb-0">
                    <button class="btn font-weight-bold btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapse{{ $loop->index + 1 }}" aria-expanded="true" 
                    aria-controls="collapse{{ $loop->index + 1 }}">
                        Message from {{ $message->email_customer }}
                    </button>
                </h2>
            </div>
        
            <div id="collapse{{ $loop->index + 1 }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $message->id }}" data-parent="#accordionExample">
                <div class="card-body">
                {{ $message->pesan }}
                </div>
                <div class="card-footer text-muted">
                    This message also sent to admin email {{ '(' . $adminAccount->email . ')' }}.
                    If you wanna reply it, feel free to  
                    <a href="https://mail.google.com" target="_blank">open your gmail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $messageCustomer->links() }}
</div>
@endsection