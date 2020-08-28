@if($child_field->input_type == 'hidden')
    <input
        type="{{ $child_field->input_type }}"
        wire:model.lazy="{{ sprintf('%s.%s', $field->key , $child_field->name) }}">
@else
    <input
    @if($child_field->getAttributes())
        @foreach($field->getAttributes() as $name => $value)
            {{ $name }}="{{ $value }}"
        @endforeach
    @endif
    type="{{ $child_field->input_type }}"
    class="form-control form-control-sm @error(sprintf('%s.%s', $field->key , $child_field->name)) is-invalid @enderror"
    autocomplete="{{ $child_field->autocomplete }}"
    placeholder="{{ $child_field->placeholder }}"
    wire:model.lazy="{{ sprintf('%s.%s', $field->key , $child_field->name) }}">
    @include(form_views_child('error-help'))
@endif
