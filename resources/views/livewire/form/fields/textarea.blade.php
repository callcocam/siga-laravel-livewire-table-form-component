<div class="form-group row">
    @include('lw-forms::fields.label')
    <div class="col-md">
        <textarea
            id="{{ $field->name }}"
            rows="{{ $field->textarea_rows }}"
            class="form-control @error($field->key) is-invalid @enderror"
            placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}"></textarea>

        @include('lw-forms::fields.error-help')
    </div>
</div>
