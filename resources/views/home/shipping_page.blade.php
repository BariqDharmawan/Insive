@extends('layouts.master')
@section('title', 'shipping address')
@section('page-title', 'shipping address')
@section('css')
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
<style type="text/css">
    span.select2-container .select2-results__option {
        color: #000 !important;
    }
</style>
@endsection
@section('body-id', 'shipping-address-page')
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <img src="{{ asset('img/product.png') }}" height="350" class="d-block mx-auto" alt="Product">
            </div>
            <div class="col">
                <p class="bg--cream mt-3 mb-5 py-1 px-2 d-lg-inline-block">Formula Code: <var class="font-weight-bold">#02139</var></p>
                <form action="{{route('home.shipping.store')}}" method="post">
                    @csrf
                    <div class="form-group form-row">
                        <label class="col-form-label col-12 col-lg-2 text--cream" for="fullname">Name:​</label>
                        <div class="col-12 col-lg-10">
                            <input class="form-control" type="text"  id="fullname" name="customer_fullname" placeholder="Please Fill Your Fullname" required>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-form-label col-12 col-lg-2 text--cream" for="email">Email:​​</label>
                        <div class="col-12 col-lg-10">
                            <input class="form-control" type="text" id="email" name="customer_email" placeholder="Please Fill Your Email" required>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-form-label col-12 col-lg-2 text--cream" for="phone">Phone:​​</label>
                        <div class="col-12 col-lg-10">
                            <input class="form-control" type="tel" pattern="[0-9]*" inputmode="tel" id="phone"
                            name="customer_phone" placeholder="Please Fill With Your Active Number" required>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-form-label col-12 col-lg-2 text--cream">City:​​</label>
                        <div class="col-12 col-lg-10">
                            <select class="form-control select2" name="customer_city" required>
                                @foreach ($allCities as $item)
                                <option value="{{$item['city_id']}}">{{$item['city_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-form-label col-12 col-lg-2 text--cream" for="address">Address:​​</label>
                        <div class="col-12 col-lg-10">
                            <textarea class="form-control" name="customer_address" id="address"
                            rows="8" placeholder="Please Fill Your Address" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn bg--cream float-right mt-3">
                        Go to payment​ <i class='bx bx-money ml-2' style="transform: translateY(1.5px)"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2(); 
    });
</script>
@endsection