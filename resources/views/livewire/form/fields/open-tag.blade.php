<{{$field->tag}}

@foreach ($field->attributes as $key => $value)
    {{ $key }}="{{ $value }}"
@endforeach
>
