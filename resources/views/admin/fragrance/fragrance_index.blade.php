@extends('template.main')

@section('title-page', 'Insive | Admin - Fragrance')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
<style media="screen">
  td {
    width: 50px;
    height: 50px;
  }
  td:last-child {
    width: 180px;
  }
</style>
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
                <h3 class="card-title">List of Fragrance</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    Add New Fragrance
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
                        @foreach($fragrance as $key => $value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img class="bg-success img-fluid" src="{{ asset('img/fragrance/'.$value->fragrance_img) }}" alt="{{$value->fragrance_img}}"></td>
                            <td>{{ $value->fragrance_name }}</td>
                            <td>
                                @if ($value->qty > 0)
                                <small class="badge badge-success"><i class="fa fa-check"></i> available</small>
                                @else
                                <small class="badge badge-danger"><i class="fa fa-times"></i> not available</small>

                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning btn-edit" data-id="{{$value->id}}" data-name="{{$value->fragrance_name}}" data-status="{{$value->qty}}" data-toggle="tooltip" data-placement="bottom" title="Edit Fragrance">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('admin.fragrance.destroy', ['fragrance'=>$value->id]) }}" onsubmit="return confirm('Are you sure?')" method="POST" class="d-inline">
                                    @csrf	@method('DELETE')
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Fragrance">
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
                <h5 class="modal-title" id="addModalLabel">Add Fragrance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="return confirm('Are you sure?')" method="post" action="{{ route('admin.fragrance.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="col-12 mb-2">
                        <label>Fragrance Name<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" name="fragrance_name" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>Fragrance Image<small class="text-danger">*</small></label>
                        <input type="file" class="form-control" name="fragrance_img" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>Fragrance available<small class="text-danger">*</small></label>
                        <select name="fragrance_status" class="form-control" id="" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
                <h5 class="modal-title" id="editModalLabel">Edit Fragrance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="return confirm('Are you sure?')" method="post" action="{{ route('admin.fragrance.update', ['fragrance'=>0]) }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="col-12 mb-2">
                        <label>Fragrance Name<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" name="fragrance_name" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>Fragrance Image<small class="text-warning"> empty this if not want to change image</small></label>
                        <input type="file" class="form-control" name="fragrance_img" autocomplete="off">
                    </div>
                    <div class="col-12 mb-2">
                        <label>Fragrance available<small class="text-danger">*</small></label>
                        <select name="fragrance_status" class="form-control" id="" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
        var route = "{{route('admin.fragrance.update.api')}}/"+id;
        $('#editModal').find('input[name="id"]').val(id);
        $('#editModal').find('input[name="fragrance_name"]').val(name);
        $('#editModal').find('select[name="fragrance_status"]').val(status);
        $('#editModal').find('form').attr('action', route);
        $('#editModal').modal();
    });
</script>
@endsection
