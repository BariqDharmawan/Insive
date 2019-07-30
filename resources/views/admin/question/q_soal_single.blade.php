<div id="loader-wrapper">
    <div id="loader"></div>
</div>
<div class="loader"></div>
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
