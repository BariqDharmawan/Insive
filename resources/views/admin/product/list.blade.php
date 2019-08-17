@extends('temp.main')
@section('title-page', 'Admin | Product List')
@section('css')
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
    .pagination {
      display: inline-flex;
      float: right;
      margin-bottom: 0;
    }
  </style>
@endsection
@section('title-body', 'Product')
@section('content')
  @if (session('added'))
    <div class="alert alert-success" role="alert">
      Product Has Been Added
    </div>
  @endif
  @if (session('success'))
    <div class="alert alert-danger" role="alert">
      Product Has Been Removed
    </div>
  @endif
  <div class="col-12">
    @if (count($products) > 0)
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
              <th class="text-center">Name</th>
              <th class="text-center">Price</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Type</th>
              <th class="text-center">Date Created</th>
              <th class="text-center" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>
                  <img src="{{ Storage::url($product->product_img) }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                  {{ $product->product_name }}
                </td>
                <td class="text-center">{{ $product->price }}</td>
                <td class="text-center">{{ $product->qty }}</td>
                <td class="text-center">
                  <a href="#" class="text-muted">
                    {{ $product->type }}
                  </a>
                </td>
                <td class="text-center">{{ $product->created_at->diffForHumans() }}</td>
                <td>
                  <button type="button" class="btn btn-link text-warning" data-toggle="modal" data-target="#modal-edit{{ $product->id }}">
                    Edit
                  </button>
                  <div class="modal fade" id="modal-edit{{ $product->id }}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                          <h4 class="modal-title">Edit {{ $product->product_name }}</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('admin.product.update', $product->id) }}" id="formEditProduct{{ $product->id }}"
                          method="post" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="form-group">
                              <input class="form-control" name="product_name" type="text" placeholder="Product Name" value="{{ $product->product_name }}" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" name="price" type="number" min="1" max="999999999" placeholder="Price" value="{{ $product->price }}" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" name="qty" type="number" min="1" max="1000000000" placeholder="Qty" value="{{ $product->qty }}" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                              <select class="form-control select2" name="type" style="width: 100%;" required>
                                <option @if ($product->type == 'Alabama') selected @endif>Alabama</option>
                                <option @if ($product->type == 'Alaska') selected @endif>Alaska</option>
                                <option @if ($product->type == 'California') selected @endif>California</option>
                                <option @if ($product->type == 'Delaware') selected @endif>Delaware</option>
                                <option @if ($product->type == 'Tennessee') selected @endif>Tennessee</option>
                                <option @if ($product->type == 'Texas') selected @endif>Texas</option>
                                <option @if ($product->type == 'Washington') selected @endif>Washington</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <div class="custom-file">
                                <input type="file" name="product_img" class="custom-file-input" id="product_image">
                                <label class="custom-file-label" for="product_image">Change Image</label>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer justify-content-end">
                          <button type="submit" form="formEditProduct{{ $product->id }}" class="btn btn-success">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <button type="button" class="btn btn-link text-danger" data-toggle="modal" data-target="#modal-delete{{ $product->id }}">
                    Remove
                  </button>
                  <div class="modal fade" id="modal-delete{{ $product->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Delete Product {{ $product->product_name }}</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure wanna remove product <strong>{{ $product->product_name }}</strong>?</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <form action="{{ route('admin.product.destroy', $product->id) }}" method="post">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">Yapp, remove it</button>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td class="mx-auto" colspan="2">
                  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-add">
                    Add New Product
                  </button>
                </td>
                <td colspan="5">{{ $products->links() }}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    @else
      <div class="alert alert-secondary col text-center" role="alert">
        No Products Removed
      </div>
    @endif
  </div>
  <div class="modal fade" id="modal-add">
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
                  <input class="form-control" name="price" type="number" min="1" max="999999999" placeholder="Price" required>
                </div>
                <div class="form-group">
                  <input class="form-control" name="qty" type="number" min="1" max="1000000000" placeholder="Qty" required>
                </div>
                <div class="form-group">
                  <select class="form-control select2" name="type" style="width: 100%;" required>
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
                    <input type="file" name="product_img" class="custom-file-input" id="product_image" required>
                    <label class="custom-file-label" for="product_image">Upload Product Image</label>
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
                  <small class="text-warning">* Please make sure to edit each product after import if you wanna change product image</small>
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
@endsection
@section('script')
  <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js" charset="utf-8"></script>
  <script>
    $(document).ready(function() {
      $('.select2').select2();
      $("#formImport input[type='file']").change(function() {
        $(this).parents("form").submit();
      });
      bsCustomFileInput.init()
      $('.alert').delay(1000).slideUp("slow");
    });
  </script>
@endsection
