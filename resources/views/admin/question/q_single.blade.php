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
<div class="col-lg-8 mx-auto">
    <div class="card" id="containerSoal">
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>
        <div class="card-header no-border">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Soal <small>{{$question->type}} {{$question->status}}</small></h3>
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">
                <p><label for="">{{$question->no_question}}. </label>{{$question->question}}
                    <span class="invalid-feedback" id="errorMsg">
                        <strong>You must select first!</strong>
                    </span>
                </p>
            </div>
            <div class="col-12">
                <div class="form-group">
                    @if ($question->category == 'single')
                    @foreach ($question->options as $item)
                    <label for="">
                        <input type="radio" class="minimal option_id" name="option_id" value="{{$item->id}}">
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
                    <select name="option_id" id="" class="form-control select_option_id">
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
    });
    $(document).on('click', '#btnNext', function() {
        var id = $(this).data('id');
        var value = $(".option_id:checked").val();
        var selectValue = $('.select_option_id').val();
        var valueArray = [];
        $(":checkbox:checked").each(function(index) {
            valueArray[index] = $(this).val();
        });
        if(selectValue !== undefined) {
            value = selectValue;
        }
        if(value === undefined && valueArray.length === 0) {
            $('#errorMsg').show();
        }
        else {
            $('#loader-wrapper').show();
            $.ajax({
                'url': '{{route("admin.question.get.soal")}}/'+id,
                'method': 'POST',
                'data': {'_token': "{{csrf_token()}}", 'option_id': value},
                'success': function (result, textStatus, xhr) {
                    if(xhr.status === 200) {
                        setTimeout(function() {
                            $("#containerSoal").html(result.view);
                        }, 2000);
                    }
                    else if(xhr.status === 201) {
                        // window.location.replace("http://stackoverflow.com");
                        window.location.href = "{{route('home.main.face.result')}}";
                    }
                },
                'error': function (xhr, textStatus, other) {
                    console.log(xhr.status);
                    var err = eval("(" + xhr.responseText + ")");
                    console.log(xhr.responseText);
                    if(xhr.status === 406) {
                        alert('You must select first!');
                        $('#errorMsg').show();
                    }
                },
                'complete': function (xhr, textStatus) {
                    setTimeout(function() {
                        $('#loader-wrapper').hide();
                    }, 2000);
                }
            });
        }
    });
</script>
@endsection
