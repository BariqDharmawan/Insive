<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="return confirm('Are you sure?')" method="post" 
            action="{{-- routing on js --}}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf @method('PUT')
                    <div class="col-12 mb-2">
                        @input([
                            'type' => 'text',
                            'name' => 'sheet_name',
                            'placeholder' => 'Sheet Name',
                            'labelText' => 'Sheet Name',
                            'isRequired' => true
                        ])
                    </div>
                    <div class="col-12 mb-2">
                        <label>
                            Sheet Price <small class="text-danger">*</small>
                        </label>
                        <input type="number" min="1000" max="999999999" class="form-control" 
                        placeholder="Ex: 20000" name="sheet_price" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>
                            Sheet Image
                            <small class="text-warning font-weight-bold">
                                empty this if not want to change image
                            </small>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="sheet_img" class="custom-file-input" id="sheet_img_edit">
                            <label class="custom-file-label" for="sheet_img_edit">
                                Choose Image For Your Sheet 
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label id="sheet_status_edit">
                            Sheet available <small class="text-danger">*</small>
                        </label>
                        <select name="is_available" class="form-control" id="sheet_status_edit" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="width: 100px;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>