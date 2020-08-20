<div class="form-group row">
   <div class="col-md">
        <input
            id="{{ $field->name }}"
            type="{{ $field->input_type ?? 'hidden' }}"
            wire:model="{{ $field->key }}">
    </div>
</div>
