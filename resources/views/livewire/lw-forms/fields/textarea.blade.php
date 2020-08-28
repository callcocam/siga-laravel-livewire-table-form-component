<div class="form-group row">
    @include(form_views_fields('label'))
    <div class="col-md">
        <textarea
        @if($field->getAttributes())
            @foreach($field->getAttributes() as $name => $value)
                {{ $name }}="{{ $value }}"
            @endforeach
        @endif
        id="{{ $field->name }}"
        rows="{{ $field->textarea_rows }}"
        class="form-control @error($field->key) is-invalid @enderror"
        placeholder="{{ $field->placeholder }}"
        wire:model.lazy="{{ $field->key }}"></textarea>
        @include(form_views_fields('error-help'))
    </div>
</div>
