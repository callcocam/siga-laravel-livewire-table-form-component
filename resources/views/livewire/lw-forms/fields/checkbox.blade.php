<div class="form-group row">
    @include(form_views_fields('label'))
    <div class="col-md">
        <div class="form-check">
            <input
            @if($field->getAttributes())
                @foreach($field->getAttributes() as $name => $value)
                    {{ $name }}="{{ $value }}"
                @endforeach
            @endif
            id="{{ $field->name }}"
            type="checkbox"
            class="form-check-input @error($field->key) is-invalid @enderror"
            wire:model.lazy="{{ $field->key }}">

            <label class="form-check-label" for="{{ $field->name }}">
                {{ $field->placeholder ?? $field->label }}
            </label>
        </div>
        @include(form_views_fields('error-help'))
    </div>
</div>
