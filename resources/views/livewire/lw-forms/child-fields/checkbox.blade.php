<div class="col-md{{ $child_field->column_width ? '-' . $child_field->column_width : '' }} mb-2 mb-md-0">
    <div class="form-check">
        <input
        @if($child_field->getAttributes())
            @foreach($field->getAttributes() as $name => $value)
                {{ $name }}="{{ $value }}"
            @endforeach
        @endif
        id="{{ sprintf('%s.%s', $field->key , $child_field->name) }}"
        type="checkbox"
        class="form-check-input @error(sprintf('%s.%s', $field->key , $child_field->name)) is-invalid @enderror"
        wire:model.lazy="{{ sprintf('%s.%s', $field->key , $child_field->name) }}">

        <label class="form-check-label" for="{{ sprintf('%s.%s', $field->key , $child_field->name) }}">
            {{ $child_field->placeholder }}
        </label>
    </div>
    @include(form_views_fields('error-help'))
</div>
