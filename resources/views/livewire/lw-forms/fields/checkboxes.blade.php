<div class="form-group row">
    @include(form_views_fields('label'))
    <div class="col-md">
        @foreach($field->options as $value => $label)
            <div class="form-check">
                <input
                @if($field->getAttributes())
                    @foreach($field->getAttributes() as $name => $value)
                        {{ $name }}="{{ $value }}"
                    @endforeach
                @endif
                id="{{ $field->name . '.' . $loop->index }}"
                name="{{ $field->key }}"
                type="checkbox"
                class="form-check-input @error($field->key) is-invalid @enderror"
                @if(in_array($value, $field->default))
                    checked
                @endif
                value="{{ $value }}"
                wire:model.lazy="{{ $field->key }}.{{ $value }}">
                <label class="form-check-label" for="{{ $field->name . '.' . $loop->index }}">
                    {{ $label }}
                </label>
            </div>
        @endforeach
        @include(form_views_fields('error-help'))
    </div>
</div>
