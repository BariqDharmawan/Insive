@extends('template.main')

@section('title-page', $title)

@section('body-id', 'manageDiscount')

@section('title-body', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <style media="screen">
        .select2 {
            width: 100% !important;
        }
    </style>
@endsection

@section('content')

    <div class="col-12">
        @if($errors->any())
            @alert(['type' => 'danger', 'closeBtn' => true])
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endalert
        @endif
        @if(session('success'))
            @alert(['type' => 'success', 'closeBtn' => true])
                {{ session('success') }}
            @endalert
        @endif
        
        @if (count($discounts) > 0)
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Managing discount</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#modal-add-disc" id="btn-add-discount">
                        Add new discount
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Discount price</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($discounts as $discount)
                            <tr class="discount">
                                <td class="discount__product-name">{{ $discount->product->product_name }}</td>
                                <td class="discount__product-price" data-price="{{ $discount->discount_price }}">
                                    @currency($discount->discount_price)
                                </td>
                                <td class="text-center">
                                    <button type="button" data-toggle="modal" data-target="#modal-add-disc"
                                    class="btn btn-link btn-sm text-warning btn-edit-discount" 
                                    data-update-url="{{ route('admin.product.manage-discount.update', $discount->id) }}">
                                        Edit
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button type="button" data-toggle="modal"
                                    class="btn btn-link text-danger bt-sm btn-confirm-delete"
                                    data-target="#modalDelConfirm" data-product-id="{{ $discount->id }}">
                                        delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            @alert(['type' => 'secondary', 'closeBtn' => false])
            <div class="d-flex justify-content-center align-items-center">
                <p class="mb-0">There is no discount set</p>
                <button type="button" class="btn btn-primary btn-sm ml-3" data-toggle="modal"
                data-target="#modal-add-disc" id="btn-add-discount">
                        Add new discount
                </button>
            </div>
            @endalert
        @endif
    </div>
    <div class="modal fade" id="modalDelConfirm" tabindex="-1" 
    aria-labelledby="modalDelConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDelConfirmLabel">
                        Delete confirmation
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure wanna delete discount on product 
                        <strong id="modalDelConfirm__product-name"></strong> ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                        Close
                    </button>
                    <form method="POST" id="modalDelConfirm__form"
                    action="">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Yes, delete it!
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-add-disc">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h4 class="modal-title">Make product discount</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <form action="{{ route('admin.product.manage-discount.store') }}" 
                    id="formAddDisc" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="product-name">Product name</label>
                            <select name="product_id" data-placeholder="Please select the product" id="product-name" class="form-control select2" required>
                                <option value=""></option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->product_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @input([
                                'labelText' => 'How much the final price?',
                                'type' => 'number',
                                'placeholder' => 'Final price after disc',
                                'ariaDesc' => 'discountPrice',
                                'min' => 1,
                                'max' => 999999999999,
                                'isRequired' => true,
                                'name' => 'discount_price'
                            ])
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" form="formAddDisc" class="btn btn-success">
                        Add new discount to product1
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection