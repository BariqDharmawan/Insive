@extends('temp.main')

@section('title-page', 'Insive | Admin - Sheet')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Manage')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
    <div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
        {{ (Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message') }}
    </div>
</div>
@endif
<div class="col-12">
    <div class="card">
        <div class="card-header no-border">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">List of Sheet</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    Add New Sheet
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sheet as $key => $value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img class="bg-success" src="{{ asset('img/sheet/'.$value->sheet_img) }}" style="width: 50px; height: 50px;" alt="{{$value->sheet_img}}"></td>
                            <td>{{ $value->sheet_name }}</td>
                            <td>
                                @if ($value->qty > 0)
                                <small class="badge badge-success"><i class="fa fa-check"></i> available</small>
                                @else
                                <small class="badge badge-danger"><i class="fa fa-times"></i> not available</small>

                                @endif
                            </td>
                            <td style="width:180px">
                                <button class="btn btn-sm btn-warning btn-edit" data-id="{{$value->id}}" data-name="{{$value->sheet_name}}" data-status="{{$value->qty}}" data-toggle="tooltip" data-placement="bottom" title="Edit Sheet">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('admin.sheet.destroy', ['sheet'=>$value->id]) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline">
                                    @csrf	@method('DELETE')
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Sheet">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="return confirm('Are you sure?')" method="post" action="{{ route('admin.sheet.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="col-12 mb-2">
                        <label>Sheet Name<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" name="sheet_name" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>Sheet Image<small class="text-danger">*</small></label>
                        <input type="file" class="form-control" name="sheet_img" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>Sheet available<small class="text-danger">*</small></label>
                        <select name="sheet_status" class="form-control" id="" required>
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="return confirm('Are you sure?')" method="post" action="{{ route('admin.sheet.update', ['sheet'=>0]) }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="col-12 mb-2">
                        <label>Sheet Name<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" name="sheet_name" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>Sheet Image<small class="text-warning"> empty this if not want to change image</small></label>
                        <input type="file" class="form-control" name="sheet_img" autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>Sheet available<small class="text-danger">*</small></label>
                        <select name="sheet_status" class="form-control" id="" required>
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

@endsection

@section('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.datatables').dataTable();
        $('.message-session').delay(3000).slideUp(600);
        $('[data-toggle="tooltip"]').tooltip();
    });
    $('.btn-edit').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var status = $(this).data('status');
        var route = "{{route('admin.sheet.update.api')}}/"+id;
        $('#editModal').find('input[name="id"]').val(id);
        $('#editModal').find('input[name="sheet_name"]').val(name);
        $('#editModal').find('select[name="sheet_status"]').val(status);
        $('#editModal').find('form').attr('action', route);
        $('#editModal').modal();
    });
</script>
@endsection
