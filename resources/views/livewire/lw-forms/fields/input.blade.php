<div class="form-group row">
    @include(form_views_fields('label'))
    <div class="col-md">
        <input
            @if($field->isDatalist())
            list="{{ $field->name }}-list"
            @endif
            id="{{ $field->name }}"
            type="{{ $field->input_type }}"
            class="{{ $field->class ?? 'form-control' }} @error($field->key) is-invalid @enderror"
            autocomplete="{{ $field->autocomplete }}"
            placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}">
        @include(form_views_fields('data-list'))
        @include(form_views_fields('error-help'))
    </div>
</div>
