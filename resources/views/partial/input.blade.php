<label for="{{ str_replace('_', '-', $name) }}">
    {{ $labelText }}
    @isset($isRequired)
    @if ($isRequired == true)
        <small class="text-danger">*</small>
    @endif
    @endisset
</label>
<input type="{{ $type ?? 'text' }}" class="form-control" name="{{ $name }}" id="{{ str_replace('_', '-', $name) }}"
placeholder="{{ $placeholder }}" @isset($value) value="{{ $value ?? old($name) }}" @else value="" @endisset
aria-describedby="{{ $ariaDesc ?? '' }}Feedback" @isset($min, $max) min="{{ $min }}" max="{{ $max }}"  @endisset
@isset($minLength, $maxLength) minlength="{{ $minLength ?? '' }}" maxlength="{{ $maxLength ?? '' }}" @endisset
@isset($isReadonly) {{ $isReadonly == true ? 'readonly' : '' }} @endisset
@isset($isRequired) {{ $isRequired == true ? 'required' : '' }} @endisset>