@extends('temp.main')

@section('title-page', 'Insive | Admin - Question')

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
                <h3 class="card-title">List of Question</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Question</th>
                            <th>Options</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($question as $key => $value)
                        <tr>
                            <td>{{ $value->no_question }}</td>
                            <td>{{ $value->question }}</td>
                            <td>
                                @foreach ($value->options as $item)
                                    {{ $item->value.'. '.$item->text }}<br>
                                @endforeach
                            </td>
                            <td>{{ $value->type }}</td>
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
