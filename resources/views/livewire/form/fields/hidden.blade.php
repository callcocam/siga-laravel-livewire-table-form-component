<div class="form-group row">
   <div class="col-md">
        <input
            id="{{ $field->name }}"
            type="{{ $field->input_type }}"
            wire:model="{{ $field->key }}">
        @include('lw-forms::fields.error-help')
    </div>
</div>