<div class="form-group row">
    @include(form_views_fields('label'))
    <div class="col-md">
        <div class="custom-file">
            <input
            @if($field->getAttributes())
                @foreach($field->getAttributes() as $name => $value)
                    {{ $name }}="{{ $value }}"
                @endforeach
            @endif
                id="{{ $field->name }}"
                type="file"
                class="custom-file-input @error($field->key) is-invalid @enderror"
                {{ $field->file_multiple ? 'multiple' : '' }}>
            <label class="custom-file-label" for="{{ $field->name }}">
                {{ $field->placeholder }}
            </label>
        </div>
        @if($form_data[$field->name] && is_array($form_data[$field->name]))
            <div class="row align-items-center mt-2">
                @foreach($form_data[$field->name] as $key => $value)
                    <div class="col">
                        <div class="card card-profile-1 mb-4">
                            <div class="card-body text-center">
                                <div class="avatar box-shadow-2 mb-3">
                                    <a href="{{ Storage::url($value['file']) }}" target="_blank">
                                        <img src="{{ Storage::url($value['file']) }}" alt="">
                                    </a>
                                </div>
                                <p> <button class="btn btn-sm btn-danger"
                                            onclick="confirm('{{ __('Are you sure?') }}') || event.stopImmediatePropagation();"
                                            wire:click="arrayRemove('{{ $field->name }}', '{{ $key }}')">
                                        <i class="fa fa-trash-alt"></i>
                                    </button></p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @include(form_views_fields('error-help'))
    </div>
</div>
