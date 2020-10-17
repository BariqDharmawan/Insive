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
                <form action="{{ route('admin.product.store') }}" id="formAddProduct" method="POST" 
                enctype="multipart/form-data">
                    @csrf
                    @include('admin.product.form')
                </form>
                {{-- @include('admin.product.form', [
                    'action' => route('admin.product.store'), 
                    'id' => 'formAddProduct'
                ]) --}}
            </div>
            <div class="modal-footer justify-content-end">
                <button type="submit" form="formAddProduct" class="btn btn-success">Add new product</button>
            </div>
        </div>
    </div>
</div>