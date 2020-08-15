<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    @foreach($fields as $field)
                        @if($field->view)
                            @include($field->view)
                        @else
                            @include(form_views_fields($field->type))
                        @endif
                    @endforeach
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-3">
                            <button class="btn btn-primary float-right" wire:click="login">{{ __('Login') }}</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
