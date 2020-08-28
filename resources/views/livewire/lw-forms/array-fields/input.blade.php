@if($array_field->input_type == 'hidden')
    <input
        type="{{ $array_field->input_type }}"
        wire:model.lazy="{{ $field->key . '.' . $key . '.' . $array_field->name }}">
@else
    <div class="col-md{{ $array_field->column_width ? '-' . $array_field->column_width : '' }} mb-2 mb-md-0">
        <input
        @if($array_field->getAttributes())
            @foreach($field->getAttributes() as $name => $value)
                {{ $name }}="{{ $value }}"
            @endforeach
        @endif
        type="{{ $array_field->input_type }}"
        class="form-control form-control-sm @error($field->key . '.' . $key . '.' . $array_field->name) is-invalid @enderror"
        autocomplete="{{ $array_field->autocomplete }}"
        placeholder="{{ $array_field->placeholder }}"
        wire:model.lazy="{{ $field->key . '.' . $key . '.' . $array_field->name }}">
        @include(form_views_arrays('error-help'))
    </div>
@endif
