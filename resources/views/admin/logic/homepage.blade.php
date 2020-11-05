@extends('template.main')

@section('title-page', 'Logic custom mask')

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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-12">
    <div class="card">
        <div class="card-header no-border">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">List of Logic</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover datatables">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Face Result</th>
                            <th>Face Description</th>
                            <th>Special Ingredients</th>
                            <th>No Formula</th>
                            <th>Face Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logic as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->option_3 }}</td>
                            <td>{{ $value->option_4 }}</td>
                            <td>{{ $value->face_result }}</td>
                            <td>{{ $value->face_description }}</td>
                            <td>{{ $value->special_ingredients }}</td>
                            <td>{{ $value->no_formula }}</td>
                            <td>
                                <img src="{{ asset('img/muka/'.$value->face_icon) }}" height="150" 
                                width="150" alt="{{$value->face_icon}}">
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-link text-warning" 
                                data-toggle="modal" data-target="#editLogic{{ $loop->index + 1 }}">
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach ($logic as $key => $value)
    <div class="modal fade" id="editLogic{{ $loop->index + 1 }}" tabindex="-1" 
        aria-labelledby="editLogicLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLogicLabel">
                        Edit logic <b>{{ $value->face_title }}</b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.logic.update', $value->id) }}" method="POST" 
                        id="editLogicForm{{ $loop->index + 1 }}">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="faceTitle{{ $loop->index + 1 }}">Face title</label>
                            <input type="text" class="form-control" id="faceTitle{{ $loop->index + 1 }}" 
                            value="{{ $value->face_title }}" name="face_title" required>
                        </div>
                        <div class="form-group">
                            <label for="faceDesc{{ $loop->index + 1 }}">Face Description</label>
                            <textarea name="face_description" class="form-control"  id="faceDesc{{ $loop->index + 1 }}"
                            cols="30" rows="10">{{ trim($value->face_description, " ") }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="faceIcon{{ $loop->index + 1 }}">
                                <label class="custom-file-label" for="faceIcon{{ $loop->index + 1 }}">
                                    Change icon
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="editLogicForm{{ $loop->index + 1 }}">
                        Save Edit
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach

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
</script>
@endsection
