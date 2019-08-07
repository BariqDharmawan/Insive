@extends('layouts.master')
@section('title', 'Custom Fragrance')
@section('page-title', 'CUSTOM YOUR OWN!')
@section('content')
  <main>
    <div class="container py-5">
      <div class="row">
        <div class="col-12 col-md-4">
          <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
        </div>
        <div class="col-12 col-md-8 d-flex d-md-block flex-wrap justify-content-center">
          <p class="bg--cream my-4 my-md-2 py-1 px-2 d-md-inline-block">Formula Code: <var class="font-weight-bold">#02139</var></p>
          <p class="text--cream px-2 px-md-0 mb-5 my-md-4">Choose your fragrance:</p>
          <div class="row mx-0 px-2 justify-content-between">
            <figure class="fragrance text-center col-6 py-3 col-md-auto">
              <img src="{{ asset('img/fragrance/rose3.png') }}" height="100" width="100" alt="Fragrance Item">
              <figcaption class="text--cream">
                <input type="radio" name="fragrance" class="d-none" id="fragrance_rose">
                <label class="m-0" for="fragrance_rose">Rose</label>
              </figcaption>
            </figure>
            <figure class="fragrance text-center col-6 py-3 col-md-auto">
              <img src="{{ asset('img/fragrance/strawberry.png') }}" height="100" width="100" alt="Fragrance Item">
              <figcaption class="text--cream">
                <input type="radio" name="fragrance" class="d-none" id="fragrance_strawberry">
                <label class="m-0" for="fragrance_strawberry">Strawberry</label>
              </figcaption>
            </figure>
            <figure class="fragrance text-center col-6 py-3 col-md-auto">
              <img src="{{ asset('img/fragrance/coffee.png') }}" height="100" width="100" alt="Fragrance Item">
              <figcaption class="text--cream">
                <input type="radio" name="fragrance" class="d-none" id="fragrance_coffee">
                <label class="m-0" for="fragrance_coffee">Coffee</label>
              </figcaption>
            </figure>
            <figure class="fragrance text-center col-6 py-3 col-md-auto">
              <img src="{{ asset('img/fragrance/Unscented.png') }}" height="100" width="100" alt="Fragrance Item">
              <figcaption class="text--cream">
                <input type="radio" name="fragrance" class="d-none" id="fragrance_unscented">
                <label class="m-0" for="fragrance_unscented">Unscented</label>
              </figcaption>
            </figure>
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
      $(".fragrance").click(function() {
        //saat fragrance di klik, tambah class selected dan hapus class selected di fragrance lain
        $(this).addClass("selected");
        $(this).siblings().removeClass("selected");
        //saat fragrance di klik, trigger input di dlm nya jd checked
        $(this).children("figcaption").find("input[type='radio']").prop("checked", true);
      });
    });
  </script>
@endsection
