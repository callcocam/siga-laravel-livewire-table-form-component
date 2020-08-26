<input
    type="{{ $child_field->input_type }}"
    wire:model.lazy="{{ sprintf('%s.%s', $field->key , $child_field->name) }}">
