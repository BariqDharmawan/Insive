<form onsubmit="return confirm('Are you sure?')" method="post" id="{{ $idForm }}"
action="{{-- routing on js --}}" class="modal-body" enctype="multipart/form-data">
    @csrf
    @if ($idForm == 'form-edit-sheet')
        @method('PUT')
    @endif
    <div class="col-12 mb-2">
        @input([
            'value' => '',
            'name' => 'sheet_name',
            'placeholder' => 'Sheet Name',
            'labelText' => 'Sheet Name',
            'ariaDesc' => 'sheetName',
            'isRequired' => true,
            'value' => ''
        ])
    </div>
    <div class="col-12 mb-2">
        @input([
            'type' => 'number',
            'value' => '',
            'name' => 'sheet_price',
            'placeholder' => 'Ex: 20000',
            'labelText' => 'Sheet Price',
            'min' => 1000,
            'max' => 999999999,
            'isRequired' => true
        ])
    </div>
    <div class="col-12 mb-2">
        <label for="sheet_img">
            Sheet Image
            @if ($idForm == 'form-add-sheet')
                <small class="text-danger">*</small>
            @endif
        </label>
        <div class="custom-file">
            <input type="file" name="sheet_img" class="custom-file-input" id="sheet_img">
            <label class="custom-file-label" for="sheet_img">
                Choose Image For Your Sheet
            </label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label id="sheet_status_add">
            Sheet available <small class="text-danger">*</small>
        </label>
        <select name="is_available" class="custom-select" id="sheet_status_add" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>
</form>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">
        Cancel
    </button>
    <button type="submit" class="btn btn-primary px-5" form="{{ $idForm }}">
        Save
    </button>
</div>