@extends('layouts.master')
@section('title', 'Custom Sheet')
@section('page-title', 'CUSTOM YOUR OWN!')
@section('body-id', 'custom-fragrance-page')
@section('content')
<main>
    <div class="container py-5">
        <form action="" method="post">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
                </div>
                <div class="col-12 col-md-8 d-flex d-md-block flex-wrap justify-content-center">
                    <p class="bg--cream my-4 my-md-2 py-1 px-2 d-md-inline-block">Formula Code: <var class="font-weight-bold">#02139</var></p>
                    <p class="text--cream px-2 px-md-0 mb-5 my-md-4">Choose your sheet:</p>
                    <div class="row mx-0 px-2 justify-content-between">
                        @foreach ($sheet as $item)
                        <figure class="sheet text-center col-6 py-3 col-md-auto  {{($item->sheet_name == 'Unscented')? 'selected' : ''}}">
                            <img src="{{ asset('img/sheet/'.$item->sheet_img) }}" height="100" width="100" alt="Fragrance Item">
                            <figcaption class="text--cream">
                                <input type="checkbox" name="sheet[]" class="d-none" value="{{$item->id}}" id="sheet_{{Str::slug($item->sheet_name, '_')}}" {{($item->sheet_name == "Unscented")? "checked" : ""}}>
                                <label class="m-0" for="sheet_{{Str::slug($item->sheet_name, '_')}}">{{$item->sheet_name}}</label>
                            </figcaption>
                        </figure>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-center justify-content-md-end py-5">
                <button type="submit" class="btn bg--cream"><b>Next</b>, Go to cart <i class='bx bx-caret-right'></i></button>
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
            $(this).children("figcaption").find("input[type='checkbox']").removeAttr("checked");
            } else {
                //saat sheet di klik, tambah class selected dan hapus class selected di sheet lain
            $(this).addClass("selected");
            //saat sheet di klik, trigger input di dlm nya jd checked
            $(this).children("figcaption").find("input[type='checkbox']").attr("checked", "checked");
            }
        });
    });
</script>
@endsection
