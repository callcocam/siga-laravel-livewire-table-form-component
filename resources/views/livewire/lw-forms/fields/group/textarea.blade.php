<div class="form-group row">
    @include(form_views_fields('group.label'))
    <div class="col-md">
        <textarea
            id="{{ $field->name }}"
            rows="{{ $field->textarea_rows }}"
            class="{{  $field->class ?? 'form-control'  }} @error($field->key) is-invalid @enderror"
            placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}"></textarea>
        @include(form_views_fields('error-help'))
    </div>
</div>
