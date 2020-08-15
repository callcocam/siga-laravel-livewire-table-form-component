<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($fields as $field)
                        @if($field->view)
                            @include($field->view)
                        @else
                                @include(form_views_fields($field->type))
                        @endif
                    @endforeach
                    <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button class="btn btn-primary float-right" wire:click="sendResetLinkEmail">{{ __('Send Password Reset Link') }}</button>
                            @if (Route::has('login'))
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Login In?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
