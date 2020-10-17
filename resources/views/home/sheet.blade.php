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
          <p class="text--cream px-2 px-lg-0 mb-5 my-lg-4 w-100 text-center text-lg-left">Choose your sheet:</p>
          <div class="row mx-0 px-2 justify-content-between">
            @foreach ($sheet as $key => $item)
            <figure class="sheet text-center col-6 py-3 col-lg-auto  {{($key == 0)? 'selected' : ''}}">
              <img src="{{ asset('img/sheet/'.$item->sheet_img) }}" class="rounded-circle p-3 bg--cream"
              alt="Fragrance Item" width="110" height="110">
              <figcaption class="text--cream">
                <input type="checkbox" name="sheet[]" class="d-none" value="{{$item->id}}"
                id="sheet_{{Str::slug($item->sheet_name, '_')}}" {{($key == 0)? 'checked="checked"' : ''}}>
                <label class="m-0">{{$item->sheet_name}}</label>
              </figcaption>
            </figure>
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
@section('script')
<script>
  $(document).ready(function() {
    $(".sheet").click(function() {
        if($(this).hasClass('selected')) {
          //saat sheet di klik, tambah class selected dan hapus class selected di sheet lain
          $(this).removeClass("selected");
          //saat sheet di klik, trigger input di dlm nya jd checked
          $(this).children("figcaption").find("input[type='checkbox']").prop("checked", false);
        } else {
          //saat sheet di klik, tambah class selected dan hapus class selected di sheet lain
          $(this).addClass("selected");
          //saat sheet di klik, trigger input di dlm nya jd checked
          $(this).children("figcaption").find("input[type='checkbox']").prop("checked", true);
        }
    });
  });
</script>
@endsection
