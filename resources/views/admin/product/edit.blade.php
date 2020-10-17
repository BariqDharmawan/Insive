<div class="modal fade" id="modal-edit-product">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h4 class="modal-title">Edit product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{-- action is set on js --}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    @include('admin.product.form')
                </form>
                {{-- @include('admin.product.form', [
                    'action' => route('admin.product.update', $product->id),
                    'id' => 'formEditProduct' . $product->id,
                    'data' => $product,
                    'method' => 'PUT'
                ]) --}}
            </div>
            <div class="modal-footer justify-content-end">
                <button type="submit" form="formEditProduct{{ $product->id }}" class="btn btn-success">
                    Update product
                </button>
            </div>
        </div>
    </div>
</div>