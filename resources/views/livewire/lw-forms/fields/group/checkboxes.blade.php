<div class="col-md-{{ $field->coll }}">
    <div class="form-group">
        @include(form_views_fields('group.label'))
        <div class="border rounded p-2 bg-white">
            @foreach($field->options as $value => $label)
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        id="{{ $field->name . '.' . $loop->index }}"
                        type="checkbox"
                        class="{{  $field->class ?? 'form-check-input'  }} @error($field->key) is-invalid @enderror"
                        value="{{ $value }}"
                        wire:model.lazy="{{ $field->key }}">

                    <label class="form-check-label" for="{{ $field->name . '.' . $loop->index }}">
                        {{ $label }}
                    </label>
                </div>
            @endforeach
            @include(form_views_fields('error-help'))
        </div>
    </div>
</div>

