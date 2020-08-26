<div class="col-md{{ $child_field->column_width ? '-' . $child_field->column_width : '' }} mb-2 mb-md-0">
    <select
        class="custom-select custom-select-sm @error(sprintf('%s.%s', $field->key , $child_field->name)) is-invalid @enderror"
        wire:model.lazy="{{ sprintf('%s.%s', $field->key , $child_field->name) }}">

        <option value="">{{ $child_field->placeholder }}</option>

        @foreach($child_field->options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
    @include(form_views_fields('error-help'))
</div>
