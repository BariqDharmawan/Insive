@extends('layouts.master')
@section('title', 'Custom Sheet')
@section('page-title', 'CUSTOM YOUR OWN!')
@section('body-id', 'custom-fragrance-page')
@section('content')
<main>
  <div class="container py-5">
    <form action="{{ route('main.sheet.store') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-12 col-lg-4">
          <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
        </div>
        <div class="col-12 col-lg-8 d-flex d-lg-block flex-wrap justify-content-center">
          <p class="bg--cream my-4 my-lg-2 py-1 px-2 d-lg-inline-block">
            Formula Code: <var class="font-weight-bold">#02139</var>
          </p>
          <p class="text--cream px-2 px-lg-0 mb-5 my-lg-4 w-100 text-center text-lg-left">
            Choose your sheet:
          </p>
          <div class="row mx-0 px-2">
            @foreach ($sheet as $item)
              <div class="col-12 col-md-6 col-lg-4 w-xl-20 sheet-box">
                  <figure class="sheet text-center">
                      <img src="{{ asset('img/sheet/'.$item->sheet_img) }}" height="100" width="100"
                      class="rounded-circle p-3 bg--cream sheet__img" alt="Fragrance Item">
                      <figcaption class="text--cream sheet__detail">
                          <input type="checkbox" name="sheet[]" class="d-none sheet__select" value="{{ $item->id }}"
                              id="sheet_{{Str::slug($item->sheet_name, '_')}}">
                          <label class="sheet__name">{{ $item->sheet_name }}</label>
                          <div class="product__action bg--blue mt-auto">
                              <a href="javascript:void(0);" class="product__button product__button--increase">
                                  <i class="bx bx-plus"></i>
                              </a>
                              <input type="number" name="jumlah_sheet[]" min="0"
                              class="order-0 mr-0 sheet__qty" required readonly>
                              <a href="#" class="product__button product__button--decrease">
                                  <i class="bx bx-minus"></i>
                              </a>
                          </div>
                      </figcaption>
                  </figure>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row justify-content-center justify-content-lg-end py-5">
        <button type="submit" class="btn bg--cream">
          <span><b>Next, </b> Go to fragrance</span>
          <i class='bx bx-caret-right'></i>
        </button>
      </div>
    </form>
  </div>
</main>
@endsection