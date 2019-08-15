@extends('layouts.admin_master')
@section('title', 'Product List')
@section('css-perpage')
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <style media="screen">
    .select2-container .select2-selection--single {
      height: 38px;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
      padding-left: 0;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
      top: 50%;
      transform: translateY(-50%);
    }
  </style>
@endsection
@section('body-id', 'product-list-page')
@section('header-app','List Product')
@section('content')
  @if (session('success'))
    <div class="alert alert-success" role="alert">
      Product Has Been Added
    </div>
  @endif
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-header border-0">
          <h3 class="card-title">Products</h3>
          <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
              <i class="fas fa-download"></i>
            </a>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped table-valign-middle">
            <thead>
            <tr>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Type</th>
              <th>Date Created</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>
                  <img src="{{ Storage::url($product->product_img) }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                  {{ $product->product_name }}
                </td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->qty }}</td>
                <td>
                  <a href="#" class="text-muted">
                    {{ $product->type }}
                  </a>
                </td>
                <td>{{ $product->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td class="mx-auto text-center" colspan="5">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                    Add New Product
                  </button>
                </td>
              </tr>
            </tfoot>
          </table>
          <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h4 class="modal-title">Add New Product</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pt-0">
                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-content-below-form-tab" data-toggle="pill" href="#custom-content-below-form"
                      role="tab" aria-controls="custom-content-below-form" aria-selected="true">Form</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-content-below-import-tab" data-toggle="pill" href="#custom-content-below-import"
                      role="tab" aria-controls="custom-content-below-import" aria-selected="false">Import</a>
                    </li>
                  </ul>
                  <div class="tab-content pt-3" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-form" role="tabpanel"
                    aria-labelledby="custom-content-below-form-tab">
                      <form action="{{ route('admin.product.store') }}" id="formAddProduct" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <input class="form-control" name="product_name" type="text" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                          <input class="form-control" name="price" type="number" min="1" max="999999999" placeholder="Price">
                        </div>
                        <div class="form-group">
                          <input class="form-control" name="qty" type="number" min="1" max="1000000000" placeholder="Qty">
                        </div>
                        <div class="form-group">
                          <select class="form-control select2" name="type" style="width: 100%;">
                            <option selected>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <div class="custom-file">
                            <input type="file" name="product_img" class="custom-file-input" id="product_image">
                            <label class="custom-file-label" for="product_image">Product Image</label>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-import" role="tabpanel"
                    aria-labelledby="custom-content-below-import-tab">
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" name="import_excel" form="formAddProduct" class="custom-file-input" id="importExcel">
                          <label class="custom-file-label" for="importExcel">Import From Excel</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-end">
                  <button type="submit" form="formAddProduct" class="btn btn-success">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js-perpage')
  <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.select2').select2();
      $("#formImport input[type='file']").change(function() {
        $(this).parents("form").submit();
      });
      $('.alert').delay(1000).slideUp("slow");
    });
  </script>
@endsection
