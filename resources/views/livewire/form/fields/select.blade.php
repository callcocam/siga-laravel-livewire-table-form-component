<div class="form-group row">
    @include('lw-forms::fields.label')
    <div class="col-md">
        <select
            id="{{ $field->name }}"
            class="custom-select @error($field->key) is-invalid @enderror"
            wire:model.lazy="{{ $field->key }}">

            <option value="">{{ $field->placeholder }}</option>

            @foreach($field->options as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>

        @include('lw-forms::fields.error-help')
    </div>
</div>
