<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                            @foreach($fields as $field)
                                @if($field->view)
                                    @include($field->view)
                                @else
                                    @include('lw-forms::fields.' . $field->type)
                                @endif
                            @endforeach

                            <div class="row">
                                <div class="col-md offset-md-2">
                                    <button class="btn btn-warning" wire:click="saveAndStay">{{ __('Save New') }}</button>
                                    <button class="btn btn-success" wire:click="saveAndGoBackResponse">{{ __('Save') }}</button>
                                    <button class="btn btn-primary" wire:click="saveAndGoBack">{{ __('Save & Go Back') }}</button>
                                    <button class="btn btn-danger" wire:click="GoBack">{{ __('Go Back') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Code is inspired by Pastor Ryan Hayden
        // https://github.com/livewire/livewire/issues/106
        // Thank you, sir!
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('input[type="file"]').forEach(file => {
                file.addEventListener('input', event => {
                    let form_data = new FormData();
                    form_data.append('component', @json(get_class($this)));
                    form_data.append('field_name', file.id);

                    for (let i = 0; i < event.target.files.length; i++) {
                        form_data.append('files[]', event.target.files[i]);
                    }

                    axios.post('{{ route('lw-forms.file-upload') }}', form_data, {
                        headers: {'Content-Type': 'multipart/form-data'}
                    }).then(response => {
                        window.livewire.emit('fileUpdate', response.data.field_name, response.data.uploaded_files);
                    });
                })
            });
        });
    </script>
@endpush
