<form onsubmit="return confirm('Are you sure?')" method="post" id="{{ $idForm }}"
action="{{-- routing on js --}}" class="modal-body" enctype="multipart/form-data">
    @csrf
    @if ($idForm == 'form-edit-fragrance')
        @method('PUT')
    @endif
    <div class="col-12 mb-2">
        <label>Fragrance Name<small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="fragrance_name" required autocomplete="off">
    </div>
    <div class="col-12 mb-2">
        <label>Fragrance Price<small class="text-danger">*</small></label>
        <input type="number" class="form-control" name="fragrance_price" required autocomplete="off">
    </div>
    <div class="col-12 mb-2">
        <label>Fragrance Image<small class="text-danger">*</small></label>
        <div class="custom-file">
            <input type="file" name="fragrance_img" class="custom-file-input" id="fragrance_img">
            <label class="custom-file-label" for="fragrance_img">
                Choose Image For Your Fragrance
            </label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>Fragrance available<small class="text-danger">*</small></label>
        <select name="is_available" class="form-control" id="" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>
</form>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" form="{{ $idForm }}">Save</button>
</div>