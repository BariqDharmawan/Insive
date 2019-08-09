@extends('temp.main')

@section('title-page', 'Insive | Admin - Pricing Configuration')

@section('css')
@endsection

@section ('title-body', 'Pricing Configuration')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
    <div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
        {{ (Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message') }}
    </div>
</div>
@endif
@foreach ($pricing as $value)
<div class="col-12">
    <div class="invoice p-3 mb-3">
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <p class="mb-0 text-capitalize"><span class="font-weight-bold">Package: </span> {{ $value->price_name }}</p>
                <p class="mb-0 text-capitalize"><span class="font-weight-bold">Price: </span>  (Rp {{ number_format($value->price, 0) }})</p>
            </div>
            <div class="col-sm-4 invoice-col">
                <p class="mb-0 text-capitalize"><span class="font-weight-bold">Purchase Amount:</span> {{ ($value->price_name == 'large')? '>'.$value->min_qty : $value->min_qty.'-'.$value->max_qty }} pcs</p>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('admin.pricing.edit', ['id'=> $value->id]) }}" class="btn btn-sm btn-warning float-right mr-3">
                    <i class="fa fa-edit"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.message-session').delay(3000).slideUp(600);
    });
</script>
@endsection
