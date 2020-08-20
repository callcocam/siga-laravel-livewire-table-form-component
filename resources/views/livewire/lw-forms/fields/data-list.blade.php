@if($field->options)
    <datalist id="{{ $field->name }}-list">
        @foreach($field->options as $list)
            <option value="{{ $list }}">
        @endforeach
    </datalist>
@endif
