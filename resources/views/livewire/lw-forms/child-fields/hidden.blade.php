<input
@if($child_field->getAttributes())
    @foreach($field->getAttributes() as $name => $value)
        {{ $name }}="{{ $value }}"
    @endforeach
@endif
type="{{ $child_field->input_type }}"
wire:model.lazy="{{ sprintf('%s.%s', $field->key , $child_field->name) }}">
