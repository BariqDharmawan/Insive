@extends('template.main')

@section('title-page', $titlePage)

@section('body-id', 'manageCatalog')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <style media="screen">
        .select2 {
            width: 100% !important;
        }

        .pagination {
            display: inline-flex;
            float: right;
            margin-bottom: 0;
        }
        
    </style>
@endsection

@section('title-body', $titlePage)

@section('content')

    @if (session('success'))
        @alert(['type' => 'success', 'closeBtn' => true])
            {{ session('success') }} 
        @endalert 
    @endif

    @if ($errors->any())
        @alert(['type' => 'danger', 'closeBtn' => true])
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endalert
    @endif

    <div class="col-12">
        @if(count($catalog) == 0)
        @if(app('request')->input('page') > 1)
            @alert(['type' => 'secondary', 'addClass' => 'text-center', 'closeBtn' => false])
            No catalog in page {{app('request')->input('page')}}. Let's
                <a href="{{route('admin.product.index')}}" class="text-primary text-no-decoration">
                    go to page 1
                </a>
            @endalert
        @else
            @alert(['type' => 'secondary', 'addClass' => 'text-center', 'closeBtn' => false])
                No catalog created. Let's
                <button type="button" class="text-primary text-no-decoration" 
                data-toggle="modal" data-target="#modal-add">
                    Add New catalog
                </button>
            @endalert
        @endif
        @else
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Managing catalog</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.product.trashed') }}"
                            class="btn btn-link text-dark btn-sm" title="See Removed product">
                            Removed product
                            <i class="nav-icon fas fa-trash ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Disc. Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Date Created</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($catalog as $product)
                                <tr class="product">
                                    <td>
                                        <img src="{{ Storage::url($product->product_img) }}" alt="Product 1"
                                            class="img-circle img-size-32 mr-2">
                                        <span class="product__name">{{ $product->product_name }}</span>
                                    </td>
                                    <td class="text-center">
                                        Rp
                                        <var class="product__price" data-price="{{ $product->price }}">
                                            {{ number_format($product->price) }}
                                        </var>
                                    </td>
                                    <td class="text-center">
                                        @if ($product->discount_price > 0)
                                            <var>
                                                {{ 'Rp ' . number_format($product->discount_price) }}
                                            </var>
                                        @else
                                            <small>(None)</small>
                                        @endif
                                    </td>
                                    <td class="text-center product__qty">{{ $product->qty }}</td>
                                    <td class="text-center product__type">
                                        <a href="#" class="text-muted">
                                            {{ $product->type }}
                                        </a>
                                    </td>
                                    <td class="text-center product__created-at">{{ $product->created_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-link text-warning btn-show-modal-edit"
                                            data-toggle="modal" data-target="#modal-edit-product"
                                            data-id={{ $product->id }}>
                                            Edit
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-link text-danger" data-toggle="modal"
                                            data-target="#modal-delete{{ $product->id }}">
                                            Remove
                                        </button>
                                        <div class="modal fade" id="modal-delete{{ $product->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            Delete Product
                                                            {{ $product->product_name }}
                                                        </h4>
                                                        <button type="button" class="close" 
                                                        data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Are you sure wanna remove product
                                                            <strong>{{ $product->product_name }}</strong> ?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <form method="post"
                                                            action="{{ route('admin.product.destroy', $product->id) }}">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-danger w-100">
                                                                Yapp, remove it
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="mx-auto" colspan="2">
                                    <button type="button" class="btn btn-primary float-left" data-toggle="modal"
                                        data-target="#modal-add">
                                        Add New catalog
                                    </button>
                                    <a href="{{ route('admin.product.manage-discount.index') }}" 
                                    class="btn btn-outline-primary ml-3">
                                        Manage Discount
                                    </a>
                                </td>
                                <td colspan="5">
                                    {{ $catalog->links() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            @include('admin.product.edit')
        @endif
        @include('admin.product.create')
    </div>
@endsection
