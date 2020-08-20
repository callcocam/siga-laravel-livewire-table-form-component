@if($field->isShowLabel())
    <label for="{{ $field->name }}">
        {{ __($field->label) }}
    </label>
@endif
