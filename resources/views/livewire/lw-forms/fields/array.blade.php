<div class="form-group row">
    @if($field->isShowLabel())
        <div class="col-md{{ $field->coll ? '-' . $field->coll : '' }} col-form-label text-md-right">
            {{ __($field->label) }}
        </div>
    @endif
    <div class="col-md">
        @if(isset($form_data[$field->name]) && $form_data[$field->name])
            <ul class="list-group mb-2">
                @foreach($form_data[$field->name] as $key => $value)

                    <div class="list-group-item list-group-item-action p-2">
                        <div class="form-row">
                            @foreach($field->array_fields as $array_field)
                                @include(form_views_arrays($array_field->type))
                            @endforeach
                            <div class="col-md-auto">
                                @if($field->array_sortable)
                                    <button class="btn btn-sm btn-primary" wire:click="arrayMoveUp('{{ $field->name }}', '{{ $key }}')">
                                        <i class="fa fa-arrow-up"></i>
                                    </button>

                                    <button class="btn btn-sm btn-primary" wire:click="arrayMoveDown('{{ $field->name }}', '{{ $key }}')">
                                        <i class="fa fa-arrow-down"></i>
                                    </button>
                                @endif

                                <button class="btn btn-sm btn-danger"
                                        onclick="confirm('{{ __('Are you sure?') }}') || event.stopImmediatePropagation();"
                                        wire:click="arrayRemove('{{ $field->name }}', '{{ $key }}')">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                @endforeach
            </ul>
        @endif
        <button class="btn btn-primary" wire:click="arrayAdd('{{ $field->name }}')">
            Add {{ Str::singular($field->label) }}
        </button>
        @include(form_views_fields('error-help'))
    </div>
</div>
