@extends('layouts.master')
@section('title', 'Custom Fragrance')
@section('page-title', 'CUSTOM YOUR OWN!')
@section('body-id', 'custom-fragrance-page')
@section('content')
<main>
  <div class="container py-5">
    <form action="{{ route('main.fragrance.store') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-12 col-lg-4">
          <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
        </div>
        <div class="col-12 col-lg-8 d-flex d-lg-block flex-wrap justify-content-center">
          <p class="bg--cream my-4 my-lg-2 py-1 px-2 d-lg-inline-block">Formula Code: <var class="font-weight-bold">#02139</var></p>
          <p class="text--cream px-2 px-lg-0 text-center text-lg-left my-lg-2 w-100">Choose your fragrance:</p>
          <div class="row mx-0 px-2 justify-content-between">
            @foreach ($fragrance as $item)
            <figure class="fragrance text-center col-6 py-3 col-lg-auto  {{($item->fragrance_name == 'Unscented')? 'selected' : ''}}">
              <img src="{{ asset('img/fragrance/'.$item->fragrance_img) }}" height="100" width="100"
              alt="Fragrance Item" class="{{($item->fragrance_name == 'Unscented')? 'unscented-fragrance' : ''}}">
              <figcaption class="text--cream">
                <input type="checkbox" name="fragrance[]" class="d-none" value="{{$item->id}}"
                id="fragrance_{{Str::slug($item->fragrance_name, '_')}}" {{($item->fragrance_name == "Unscented")? 'checked="checked"' : ''}}>
                <label class="m-0">{{$item->fragrance_name}}</label>
              </figcaption>
            </figure>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row justify-content-center justify-content-lg-end py-5">
        <button type="submit" class="btn bg--cream"><b>Next</b>, Go to cart <i class='bx bx-caret-right'></i></button>
      </div>
    </form>
  </div>
</main>
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $(".fragrance").click(function() {
      if($(this).hasClass('selected')) {
        //saat fragrance di klik, tambah class selected dan hapus class selected di fragrance lain
        $(this).removeClass("selected");
        //saat fragrance di klik, trigger input di dlm nya jd checked
        $(this).children("figcaption").find("input[type='checkbox']").removeAttr("checked");
      } else {
        //saat fragrance di klik, tambah class selected dan hapus class selected di fragrance lain
        $(this).addClass("selected");
        //saat fragrance di klik, trigger input di dlm nya jd checked
        $(this).children("figcaption").find("input[type='checkbox']").attr("checked", "checked");
      }
    });
  });
</script>
@endsection
