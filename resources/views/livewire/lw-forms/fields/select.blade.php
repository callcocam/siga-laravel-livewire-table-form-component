<div class="form-group row">
    @include(form_views_fields('label'))
    <div class="col-md">
        <select
        @if($field->getAttributes())
            @foreach($field->getAttributes() as $name => $value)
                {{ $name }}="{{ $value }}"
            @endforeach
        @endif
        id="{{ $field->name }}"
        class="custom-select @error($field->key) is-invalid @enderror"
        wire:model.lazy="{{ $field->key }}">

        <option value="">{{ $field->placeholder }}</option>

        @foreach($field->options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
            </select>
            @include(form_views_fields('error-help'))
    </div>
</div>
