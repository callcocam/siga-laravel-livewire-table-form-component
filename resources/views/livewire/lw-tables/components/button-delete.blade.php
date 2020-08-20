@if($confirming==$model->id)
    <button type="button"
    @foreach ($attributes as $key => $value)
        {{ $key }}="{{ $value }}"
    @endforeach
    wire:click="kill('{{ $model->id }}')"
    class="{{ $classDeleteConfirm }}"
    >
    @if (array_key_exists('icon', $options))
        <i class="{{ $options['icon'] }}"></i>
        @endif
        {{ $options['confirm'] ?? '' }}
        </button>
@else
        <button type="button"
        @foreach ($attributes as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
        wire:click="confirmDelete('{{ $model->id }}')"
        class="{{ $classDelete }}"
        >
        @if (array_key_exists('icon', $options))
            <i class="{{ $options['icon'] }}"></i>
            @endif
            {{ $options['text'] ?? '' }}
            </button>
@endif
