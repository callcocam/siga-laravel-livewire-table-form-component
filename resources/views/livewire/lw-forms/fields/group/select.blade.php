<div class="col-md-{{ $field->coll }}">
    <div class="form-group">
        @include(form_views_fields('group.label'))
        <select
            id="{{ $field->name }}"
            class="{{  $field->class ?? 'custom-select'  }} @error($field->key) is-invalid @enderror"
            wire:model.lazy="{{ $field->key }}">

            <option value="">{{ $field->placeholder }}</option>

            @foreach($field->options as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
        @include(form_views_fields('error-help'))
    </div>
</div>
