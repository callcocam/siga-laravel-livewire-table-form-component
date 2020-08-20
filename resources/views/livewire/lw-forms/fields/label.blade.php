@if($field->isShowLabel())
    <label for="{{ $field->name }}" class="col-md{{ $field->coll ? '-' . $field->coll : '' }} col-form-label text-md-right">
        {{ __($field->label) }}
    </label>
@endif
