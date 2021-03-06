<tbody class="list m-1">
@if($models->isEmpty()){{-- Primeiro if  --}}
    <tr><td colspan="{{ collect($columns)->count() }}">{{ $noResultsMessage }}</td></tr>
@else {{--  Primeiro else --}}

    @foreach($models as $model){{-- Open foreach row  --}}
        <tr
            class="{{ $this->setTableRowClass($model) }}"
            id="{{ $this->setTableRowId($model) }}"
        @foreach ($this->setTableRowAttributes($model) as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
        >
        @if($checkbox && $checkboxLocation === 'left')
            @include(table_views_includes('_checkbox-row'))
        @endif

        @foreach($columns as $column){{-- Open foreach column --}}
            <td
                class="{{ $this->setTableDataClass($column->attribute, Arr::get($model->toArray(), $column->attribute)) }}"
                id="{{ $this->setTableDataId($column->attribute, Arr::get($model->toArray(), $column->attribute)) }}"
            @foreach ($this->setTableDataAttributes($column->attribute, Arr::get($model->toArray(), $column->attribute)) as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            >
            @if ($column->hasComponents())
                @if($column->componentsAreHiddenForModel($model))
                    @if($message = $column->componentsHiddenMessageForModel($model))
                      {{ $message }}                                    &nbsp;
                    @endif
                    @else
                        @foreach($column->getComponents() as $component)
                            @if (! $component->isHidden())
                                @include($component->view(), ['model' => $model, 'attributes' => $component->getAttributes(), 'options' => $component->getOptions()])
                            @endif
                        @endforeach
                    @endif
                @elseif ($column->isView())
                    @include($column->view, [$column->getViewModelName() => $model])
                @else
                    @if ($column->isHtml())
                        @if ($column->isCustomAttribute())
                            {{ new \Illuminate\Support\HtmlString($model->{$column->attribute}) }}
                        @else
                            {{ new \Illuminate\Support\HtmlString(Arr::get($model->toArray(), $column->attribute)) }}
                        @endif
                    @elseif ($column->isUnescaped())
                        @if ($column->isCustomAttribute())
                            {!! $model->{$column->attribute} !!}
                        @else
                            {!! Arr::get($model->toArray(), $column->attribute) !!}
                        @endif
                    @else
                        @if ($column->isCustomAttribute())
                            {{ $model->{$column->attribute} }}
                        @else
                            {{ Arr::get($model->toArray(), $column->attribute) }}
                        @endif
                    @endif
                @endif
            </td>
        @endforeach {{-- Close foreach column  --}}
        @if($checkbox && $checkboxLocation === 'right')
        @include(table_views_includes('_checkbox-row'))
        @endif
        </tr>
    @endforeach{{-- Close foreach row --}}
@endif{{-- Fim do primeiro if & else  --}}
</tbody>
