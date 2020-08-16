<div class="col-md{{ $field->coll ? '-' . $field->coll : '' }}">
    <div class="form-group">
          @include(form_views_fields('group.label'))
        <input
            id="{{ $field->name }}"
            type="{{ $field->input_type }}"
            class="{{ $field->class ?? 'form-control' }} @error($field->key) is-invalid @enderror"
            autocomplete="{{ $field->autocomplete }}"
            placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}">
        @include(form_views_fields('error-help'))
    </div>
</div>
