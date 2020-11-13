@extends('template.main')

@section('title-page', 'Serum')

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

@section ('title-body', 'Manage Serum')

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
                <h3 class="card-title">List of Serum</h3>
                <button type="button" class="btn btn-primary" id="btn-add-fragrance" 
                data-toggle="modal" data-target="#addModal">
                    Add New Serum
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
                        @foreach($fragrance as $key => $value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img class="bg-success img-fluid" 
                                width="50" height="50"
                                src="{{ asset('img/fragrance/'.$value->fragrance_img) }}" 
                                alt="{{$value->fragrance_img}}">
                            </td>
                            <td>{{ $value->fragrance_name }}</td>
                            <td>@currency($value->price)</td>
                            <td>
                                @include('admin.frag-sheet-status')
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning btn-edit" data-price="{{ $value->price }}"
                                data-id="{{$value->id}}" data-name="{{$value->fragrance_name}}" 
                                data-status="{{$value->qty}}" data-toggle="tooltip" 
                                data-placement="bottom" title="Edit Fragrance">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('admin.serum.destroy', ['fragrance' => $value->id]) }}"
                                onsubmit="return confirm('Are you sure?')" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" 
                                    data-placement="bottom" title="Delete Fragrance">
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

{{-- modal add and edit fragrance --}}
@include('fragrance.add-edit')

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
    
    let id, name, status, price, route;
    const editModal = $('#editModal'), addModal = $('#addModal');

    $("#btn-add-fragrance").on('click', function() {
        route = "{{ route('admin.serum.store') }}";

        addModal.find('input[name="fragrance_img"]').prop('required', true);
        addModal.find('form').attr('action', route);
    });
    
    $('.btn-edit').on('click', function() {
        id = $(this).data('id');
        name = $(this).data('name');
        status = $(this).data('status');
        price = $(this).data('price');
        route = "{{route('admin.serum.update.api')}}/"+id;

        editModal.find('input[name="id"]').val(id);
        editModal.find('input[name="fragrance_price"]').val(price);
        editModal.find('input[name="fragrance_name"]').val(name);
        editModal.find('select[name="fragrance_status"]').val(status);
        editModal.find('input[name="fragrance_img"]').prop('required', false);
        editModal.find('form').attr('action', route);
        editModal.modal();
    });
</script>
@endsection
