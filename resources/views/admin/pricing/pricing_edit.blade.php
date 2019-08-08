@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Pricing Configuration')

@section('css')
@endsection

@section ('title-body', 'Configure '.ucwords($pricing->price_name).' Package')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
    <div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
</div>
@endif
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.pricing.update', ['id' => $pricing->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <label>Price</label>  
                        <input type="number" name="price" class="form-control" value="{{ $pricing->price }}" required autocomplete="off">
                        @if ($errors->has('price'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                        @endif  
                    </div>
                    <div class="col-12">
                        <label>Minimum Purchase</label>  
                        <input type="number" name="min_qty" class="form-control" value="{{ $pricing->min_qty }}" required autocomplete="off">
                        @if ($errors->has('min_qty'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('min_qty') }}</strong>
                        </span>
                        @endif  
                    </div>
                    @if ($pricing->price_name != 'large')
                    <div class="col-12">
                        <label>Maximum Purchase</label>  
                        <input type="number" name="max_qty" class="form-control" value="{{ $pricing->max_qty }}" required autocomplete="off">
                        @if ($errors->has('max_qty'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('max_qty') }}</strong>
                        </span>
                        @endif  
                    </div>
                    @endif
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                        <a href="{{ route('admin.pricing.index') }}" class="btn btn-secondary float-right mr-2">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.message-session').delay(3000).slideUp(600);
    });
</script>
@endsection
