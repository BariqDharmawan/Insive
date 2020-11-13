<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="return confirm('Are you sure?')" method="post" 
            action="{{ route('admin.sheet.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="col-12 mb-2">
                        <label>Sheet Name<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" placeholder="Ex: Vanilla Mask" 
                        name="sheet_name" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>
                            Sheet Image
                            <small class="text-danger">*</small>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="sheet_img" class="custom-file-input" id="sheet_img" required>
                            <label class="custom-file-label" for="sheet_img">
                                Choose Image For Your Sheet
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label>
                            Sheet Price <small class="text-danger">*</small>
                        </label>
                        <input type="number" min="1000" max="999999999" class="form-control" 
                        placeholder="Ex: 20000" name="sheet_price" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label id="sheet_status_add">
                            Sheet available <small class="text-danger">*</small>
                        </label>
                        <select name="is_available" class="form-control" id="sheet_status_add" required>
                            <option value="true">Yes</option>
                            <option value="false">No</option>
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