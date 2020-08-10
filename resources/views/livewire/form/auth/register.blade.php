<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            @foreach($fields as $field)
                                @if($field->view)
                                    @include($field->view)
                                @else
                                    @include('lw-forms::fields.' . $field->type)
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-md offset-md-3 float-right">
                                    <button class="btn btn-primary float-right" wire:click="saveAndStay">{{ __('Register') }}</button>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
