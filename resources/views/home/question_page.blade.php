@extends('layouts.master')
@section('title', 'Pertanyaan')
@section('body-id', 'question-page')
@section('css')
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
<style type="text/css">
  span.select2-container .select2-results__option {
    color: #000 !important;
  }
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
@section('content')
<aside>
  <a href="javascript:void(0)" class="logo-question logo-skin active"><img src="{{ asset('img/logo/skin.png') }}" class="mr-2" height="150"><span>skin</span></a>
  <a href="javascript:void(0)" class="logo-question logo-lifestyle"><img src="{{ asset('img/logo/lifestyle.png') }}" class="mr-2" height="150"><span>lifestyle</span></a>
  <a href="javascript:void(0)" class="logo-question logo-environment"><img src="{{ asset('img/logo/environment.png') }}" class="mr-2" height="150"><span>environment</span></a>
</aside>
<main>
  <div class="container" id="containerQuestion" style="height: 100%;">
    <div class="col-12">
      <div id="loader-wrapper">
        <div id="loader"></div>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <h1>{{$question->no_question}}. {{$question->question}}</h1>
          <span class="invalid-feedback" id="errorMsg">
            <strong>You must select first!</strong>
          </span>
          <ul>
            @if ($question->category == 'single')
            @foreach ($question->options as $item)
            <li>
              <input type="radio" id="qfirst_{{$item->id}}" class="option_id" name="option_id" value="{{$item->id}}">
              <label for="qfirst_{{$item->id}}">{{$item->text}}</label>
            </li>
            @endforeach
            @elseif ($question->category == 'multiple')
            @foreach ($question->options as $item)
            <li>
              <input type="checkbox" id="qfirst_{{$item->id}}" name="option_id[]" value="{{$item->id}}">
              <label for="qfirst_{{$item->id}}"><i class='bx bx-check'></i> {{$item->text}}</label>
            </li>
            @endforeach
            @elseif ($question->category == 'dropdown')
            <select class="custom-select select_option_id" id="city" name="question_seventeenth">
              @foreach ($allCities as $city)
              <option>{{ $city->name }}</option>
              @endforeach
            </select>
            @endif
          </ul>
        </div>
      </div>
      <a class="carousel-control-next" id="btnNext" href="javascript:void(0)" role="button" data-slide="next" data-id="{{$question->id}}">
        <span class="carousel-control-next-icon" aria-hidden="true">
          <i class='bx bx-right-arrow-alt'></i>
        </span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</main>
@endsection
@section('script')
<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function(){
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
      console.log(value);
      $('#loader-wrapper').show();
      $.ajax({
        'url': '{{route("main.question.get.soal")}}/'+id,
        'method': 'POST',
        'data': {'_token': "{{csrf_token()}}", 'option_id': value},
        'success': function (result, textStatus, xhr) {
          if(xhr.status === 200) {
            setTimeout(function() {
              $("#containerQuestion").html(result.view);
              if(result.type == "skin") {
                $('.logo-question').removeClass('active');
                $('.logo-question.logo-skin').addClass('active');
              }
              else if(result.type == "lifestyle") {
                $('.logo-question').removeClass('active');
                $('.logo-question.logo-lifestyle').addClass('active');
              }
              else if(result.type == "environment") {
                $('.logo-question').removeClass('active');
                $('.logo-question.logo-environment').addClass('active');
              }
              $('.select2').select2();
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
