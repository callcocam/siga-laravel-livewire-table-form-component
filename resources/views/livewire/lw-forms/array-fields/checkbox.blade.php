<div class="col-md{{ $array_field->column_width ? '-' . $array_field->column_width : '' }} mb-2 mb-md-0">
    <div class="form-check">
        <input
        @if($array_field->getAttributes())
            @foreach($field->getAttributes() as $name => $value)
                {{ $name }}="{{ $value }}"
            @endforeach
        @endif
        id="{{ $field->key . '.' . $key . '.' . $array_field->name }}"
        type="checkbox"
        class="form-check-input @error($field->key . '.' . $key . '.' . $array_field->name) is-invalid @enderror"
        wire:model.lazy="{{ $field->key . '.' . $key . '.' . $array_field->name }}">

        <label class="form-check-label" for="{{ $field->key . '.' . $key . '.' . $array_field->name }}">
            {{ $array_field->placeholder }}
        </label>
    </div>
    @include(form_views_arrays('error-help'))
</div>
