<div class="form-group row">
    @include('lw-forms::fields.label')

    <div class="col-md">
        <div class="form-check">
            <input
                id="{{ $field->name }}"
                type="checkbox"
                class="form-check-input @error($field->key) is-invalid @enderror"
                wire:model.lazy="{{ $field->key }}">

            <label class="form-check-label" for="{{ $field->name }}">
                {{ $field->placeholder ?? $field->label }}
            </label>
        </div>

        @include('lw-forms::fields.error-help')
    </div>
</div>
