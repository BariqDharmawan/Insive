<label for="{{ str_replace('_', '-', $name) }}">{{ $labelText }}</label>
<input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ str_replace('_', '-', $name) }}"
placeholder="{{ $placeholder }}" value="{{ $value ?? old($name) }}" 
aria-describedby="{{ $ariaDesc ?? '' }}Feedback" @isset($min, $max) min="{{ $min }}" max="{{ $max }}"  @endisset
@isset($minLength, $maxLength) minlength="{{ $minLength ?? '' }}" maxlength="{{ $maxLength ?? '' }}" @endisset
@isset($isReadonly) {{ $isReadonly == true ? 'readonly' : '' }} @endisset
@isset($isRequired) {{ $isRequired == true ? 'required' : '' }} @endisset>