<div class="col-md{{ $array_field->column_width ? '-' . $array_field->column_width : '' }} mb-2 mb-md-0">
    <textarea
    @if($array_field->getAttributes())
        @foreach($field->getAttributes() as $name => $value)
            {{ $name }}="{{ $value }}"
        @endforeach
    @endif
    rows="{{ $array_field->textarea_rows }}"
    class="form-control form-control-sm @error($field->key . '.' . $key . '.' . $array_field->name) is-invalid @enderror"
    placeholder="{{ $array_field->placeholder }}"
    wire:model.lazy="{{ $field->key . '.' . $key . '.' . $array_field->name }}"></textarea>
    @include(form_views_arrays('error-help'))
</div>
