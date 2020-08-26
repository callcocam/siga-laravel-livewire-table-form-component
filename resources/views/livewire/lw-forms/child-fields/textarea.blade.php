<div class="col-md{{ $child_field->column_width ? '-' . $child_field->column_width : '' }} mb-2 mb-md-0">
    <textarea
        rows="{{ $child_field->textarea_rows }}"
        class="form-control form-control-sm @error(sprintf('%s.%s', $field->key , $child_field->name)) is-invalid @enderror"
        placeholder="{{ $child_field->placeholder }}"
        wire:model.lazy="{{ sprintf('%s.%s', $field->key , $child_field->name) }}"></textarea>
    @include(form_views_fields('error-help'))
</div>
