<div class="form-group row">
    @include('lw-forms::fields.label')
    <div class="col-md">
        <input
            id="{{ $field->name }}"
            type="{{ $field->input_type }}"
            class="form-control @error($field->key) is-invalid @enderror"
            autocomplete="{{ $field->autocomplete }}"
            placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}">
        @include('lw-forms::fields.error-help')
    </div>
</div>
