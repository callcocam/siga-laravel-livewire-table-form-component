<div class="row">
    <div class="col-md-6">
        <div class="p-4">
            <div class="auth-logo text-center mb-4"><img src="{{ asset('dist-assets/images/logo.png') }}" alt=""></div>
            <h1 class="mb-3 text-18">{{ __('Forgout Password') }}</h1>
            <form  wire:submit.prevent="sendResetLinkEmail">
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
                <button class="btn btn-primary btn-block btn-rounded mt-3" type="submit">{{ __('Send Password Reset Link') }}</button>
            </form>
            <div class="mt-3 text-center"><a class="text-muted" href="{{ route('login') }}">
                    <u>{{ __('Sign in') }}</u></a></div>
        </div>
    </div>
    <div class="col-md-6 text-center" style="background-size: cover;background-image: url({{ asset('dist-assets/images/photo-long-3.jpg') }})">
        <div class="pr-3 auth-right">
            @if (Route::has('register'))
                <a class="btn btn-outline-primary btn-outline-email btn-block btn-icon-text btn-rounded" href="{{ route('register') }}"><i class="i-Mail-with-At-Sign"></i>{{ __('Sign up with Email') }}</a>
            @endif
        </div>
    </div>
</div>
