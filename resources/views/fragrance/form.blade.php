<form onsubmit="return confirm('Are you sure?')" method="post" id="{{ $idForm }}"
action="{{-- routing on js --}}" class="modal-body" enctype="multipart/form-data">
    @csrf
    @if ($idForm == 'form-edit-fragrance')
        @method('PUT')
    @endif
    <div class="col-12 mb-2">
        @input([
            'value' => '',
            'name' => 'fragrance_name',
            'placeholder' => 'Serum name',
            'labelText' => 'Serum name',
            'isRequired' => true,
        ])
    </div>
    <div class="col-12 mb-2">
        @input([
            'type' => 'number',
            'value' => '',
            'name' => 'fragrance_price',
            'placeholder' => 'Serum Price',
            'labelText' => 'Serum Price',
            'min' => 1000,
            'max' => 999999999,
            'isRequired' => true,
        ])
    </div>
    <div class="col-12 mb-2">
        <label>Serum Image<small class="text-danger">*</small></label>
        <div class="custom-file">
            <input type="file" name="fragrance_img" class="custom-file-input" id="fragrance_img">
            <label class="custom-file-label" for="fragrance_img">
                Choose Image For Your Serum
            </label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>Serum available<small class="text-danger">*</small></label>
        <select name="is_available" class="custom-select" id="" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>
</form>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" form="{{ $idForm }}">Save</button>
</div>