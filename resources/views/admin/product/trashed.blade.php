@extends('template.main')
@section('title-page', $titlePage)
@section('title-body', $titlePage)
@section('content')
<div class="col-12">
    @if (session('deleted'))
    <div class="alert alert-danger" role="alert">
        Succesfull Deleted Product Permanently
    </div>
    @endif
    @if (count($removed) > 0)
    <table class="table table-striped table-valign-middle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Type</th>
                <th>Date Created</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($removed as $product)
            <tr>
                <td>
                    <img src="{{ Storage::url($product->product_img) }}" alt="Product 1"
                        class="img-circle img-size-32 mr-2">
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
                <td>
                    <form action="{{ route('admin.product.restored', $product->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link text-success">Undelete</button>
                    </form>
                </td>
                <td>
                    <button type="button" class="btn btn-link text-danger" data-toggle="modal"
                        data-target="#modal-delete{{ $product->id }}">
                        Permanently Delete
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
                                    <p>Are you sure wanna remove product <strong>{{ $product->product_name }}</strong>?
                                    </p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <form action="{{ route('admin.product.permanently_delete.single', $product->id) }}"
                                        method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100">Yapp, remove it
                                            permanent</button>
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
                <td class="mx-auto text-center" colspan="7">
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                        data-target="#modal-delete-permanent">
                        Delete All Permanently
                    </button>
                    <div class="modal fade" id="modal-delete-permanent">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Permanently</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure wanna delete all product permanently?</p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <form action="{{ route('admin.product.permanently_delete.all', $product->id) }}"
                                        method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100">Yapp, remove it
                                            permanent</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
    @else
    @alert(['type' => 'secondary', 'addClass' => 'text-center'])
      No Products Removed
    @endalert
    @endif
</div>
@endsection
