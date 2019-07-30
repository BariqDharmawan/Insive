@extends('temp.main')

@section('title-page', 'Insive | Admin - Question')

@section('css')
<style type="text/css">
    #loader-wrapper {
        display: none;
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        z-index: 1000;
        background: rgba(57, 57, 57, 0.9);
    }
    #loader {
        display: block;
        position: relative;
        left: 50%;
        top: 50%;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border-radius: 50%;
        border: 5px solid transparent;
        border-top-color: #F6E1B2;
        
        -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }
    
    #loader:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 5px solid transparent;
        border-top-color: #FEC66E;
        
        -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }
    
    #loader:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 5px solid transparent;
        border-top-color: #C7763E;
        
        -webkit-animation: spin 1s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 1s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }
    
    @-webkit-keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }
    @keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }
</style>
@endsection

@section ('title-body', 'Manage')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card" id="containerSoal">
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>
        <div class="card-header no-border">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Soal <small>{{$question->type}} {{$question->status}}</small></h3>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add New Question
                </button> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">
                <p><label for="">{{$question->no_question}}. </label>{{$question->question}}</p>
                
            </div>
            <div class="col-12">
                <div class="form-group">
                    @if ($question->category == 'single')
                    @foreach ($question->options as $item)
                    <label for="">
                        <input type="radio" class="minimal" name="option_id" value="{{$item->id}}">
                        {{$item->text}}
                    </label>
                    <br>
                    @endforeach
                    @elseif ($question->category == 'multiple')
                    @foreach ($question->options as $item)
                    <label for="">
                        <input type="checkbox" class="minimal" name="option_id[]" value="{{$item->id}}">
                        {{$item->text}}
                    </label>
                    <br>
                    @endforeach
                    @elseif ($question->category == 'dropdown')
                    <select name="option_id" id="" class="form-control">
                        @foreach ($question->options as $item)
                        <option value="{{$item->id}}">{{$item->text}}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <button class="float-right btn btn-primary" id="btnNext" data-id="{{$question->id}}">next <i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $(document).on('click', '#btnNext', function() {
            $('#loader-wrapper').show();
            var id = $(this).data('id');
            $.ajax({
                'url': '{{route("admin.question.get.soal")}}/'+(+id+1),
                'method': 'GET',
                'success': function (result) {
                    setTimeout(function() {
                        $("#containerSoal").html(result);
                    }, 2000);
                },
                'error': function (xhr, msg, other) {
                    alert("error");
                    setTimeout(function() {
                        $('#loader-wrapper').hide();
                    }, 3000);
                }
            }); 
        });
    });
</script>
@endsection
