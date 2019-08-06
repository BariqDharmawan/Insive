@extends('layouts.master')
@section('title', 'Custom Fragrance')
@section('page-title', 'CUSTOM YOUR OWN!')
@section('body-id', 'custom-fragrance-page')
@section('content')
<main>
    <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
                </div>
                <div class="col-12 col-md-8 d-flex d-md-block flex-wrap justify-content-center">
                    <p class="bg--cream my-4 my-md-2 py-1 px-2 d-md-inline-block">Formula Code: <var class="font-weight-bold">#02139</var></p>
                    <p class="text--cream px-2 px-md-0 mb-5 my-md-4">Qty:</p>
                    <div class="row mx-0 px-2 justify-content-between">
                        @foreach ($product as $item)
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-center justify-content-md-end py-5">
                <button type="submit" class="btn bg--cream"><b>Next</b>, Go to cart <i class='bx bx-caret-right'></i></button>
            </div>
    </div>
</main>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    });
</script>
@endsection
