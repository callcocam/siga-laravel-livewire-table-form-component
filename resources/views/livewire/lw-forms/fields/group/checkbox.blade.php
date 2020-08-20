<div class="col-md{{ $field->coll ? '-' . $field->coll : '' }}">
    <div class="form-group">
        @include(form_views_fields('group.label'))
        <div class="border rounded p-2 bg-white">
            <div class="custom-control custom-radio custom-control-inline">
                <input
                    id="{{ $field->name }}"
                    type="checkbox"
                    class="{{  $field->class ?? 'form-check-input' }} @error($field->key) is-invalid @enderror"
                    wire:model.lazy="{{ $field->key }}">

                <label class="form-check-label" for="{{ $field->name }}">
                    {{ $field->placeholder ?? $field->label }}
                </label>
            </div>
        </div>
    </div>
</div>
