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
@include('lw::livewire.form.scripts')
