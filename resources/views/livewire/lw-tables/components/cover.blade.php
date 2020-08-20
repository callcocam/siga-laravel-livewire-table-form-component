@if(is_array($model->{$column->attribute}))
    <div class="avatar-group">
        @foreach($model->{$column->attribute} as $cover)
            <img
                src="{{ Storage::url($cover['file']) }}"
            @foreach ($attributes as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            />
        @endforeach
    </div>
@endif
