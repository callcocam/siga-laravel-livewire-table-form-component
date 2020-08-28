<div class="form-group row">
    <div class="col-md">
        <input
        @if($field->getAttributes())
            @foreach($field->getAttributes() as $name => $value)
                {{ $name }}="{{ $value }}"
            @endforeach
        @endif
        id="{{ $field->name }}"
        type="{{ $field->input_type }}"
        wire:model="{{ $field->key }}">
    </div>
</div>
