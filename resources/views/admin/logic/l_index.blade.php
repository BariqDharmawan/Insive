@extends('temp.main')

@section('title-page', 'Insive | Admin - Logic')

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
                <h3 class="card-title">List of Logic</h3>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add New Question
                </button> --}}
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
                            {{-- <th class="text-left">Action</th> --}}
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
                            <td><img src="{{ asset('img/muka/'.$value->face_icon) }}" style="width: 150px; height: 150px;" alt="{{$value->face_icon}}"></td>
                            {{-- <td>
                                <form action="" method="POST">
                                    @csrf	@method('DELETE')
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Question">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
</script>
@endsection
