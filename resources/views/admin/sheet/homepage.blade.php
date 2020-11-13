@extends('template.main')

@section('title-page', 'Sheet')

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
                <h3 class="card-title">List of Sheet</h3>
                <button type="button" class="btn btn-primary" id="btn-add-sheet" 
                data-toggle="modal" data-target="#addModal">
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
                            <th>Price</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sheet as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img class="bg-success" src="{{ asset('img/sheet/'.$value->sheet_img) }}" 
                                width="50" height="50" alt="{{$value->sheet_img}}">
                            </td>
                            <td>{{ $value->sheet_name }}</td>
                            <td>@currency($value->price)</td>
                            <td>
                                @include('admin.frag-sheet-status')
                            </td>
                            <td style="width:180px">
                                <button class="btn btn-sm btn-warning btn-edit" data-id="{{$value->id}}" 
                                    data-name="{{$value->sheet_name}}" data-price="{{ $value->price }}"
                                    data-status="{{ $value->is_available }}" data-toggle="tooltip" data-placement="bottom" title="Edit Sheet">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('admin.sheet.destroy', ['sheet' => $value->id]) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline">
                                    @csrf @method('DELETE')
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

{{-- modal add and edit sheet --}}
@include('admin.sheet.add-edit')

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

    let route;
    const addModal = $("#addModal");
    $("#btn-add-sheet").on('click', function() {
       route = "{{ route('admin.sheet.store') }}";
       addModal.find('input[name="sheet_img"]').prop('required', true)
       addModal.find('form').attr('action', route);
    });

    let price, id, name, status;
    const editModal = $('#editModal');
    $('.btn-edit').on('click', function() {
        id = $(this).data('id');
        name = $(this).data('name');
        status = $(this).data('status');
        price = $(this).data('price');
        route = "{{route('admin.sheet.update.api')}}/"+id;
        editModal.find('input[name="id"]').val(id);
        editModal.find('input[name="sheet_img"]').prop('required', false);
        editModal.find('input[name="sheet_name"]').val(name);
        editModal.find('input[name="sheet_price"]').val(price);
        editModal.find('select[name="sheet_status"]').val(status);
        editModal.find('form').attr('action', route);
        editModal.modal();
    });
</script>
@endsection
