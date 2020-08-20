<div class="row">
    <div class="col-md-6 text-center" style="background-size: cover;background-image: url({{ asset('dist-assets/images/photo-long-3.jpg') }})">
        <div class="pl-3 auth-right">
            <div class="auth-logo text-center mt-4"><img src="{{ asset('dist-assets/images/logo.png') }}" alt=""></div>
            <div class="flex-grow-1"></div>
            <div class="w-100 mb-4">
                <a class="btn btn-outline-primary btn-block btn-icon-text btn-rounded" href="{{ route('login') }}"><i class="i-Mail-with-At-Sign"></i> {{ 'Sign in with Email' }}</a>
            </div>
            <div class="flex-grow-1"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="p-4">
            <h1 class="mb-3 text-18">{{ __('Sign Up') }}</h1>
            <form   wire:submit.prevent="saveAndStay">
                @foreach($fields as $field)
                    @if($field->view)
                        @include($field->view)
                    @else
                        @include(form_views_fields($field->type))
                    @endif
                @endforeach
                <button class="btn btn-primary btn-block btn-rounded mt-3" type="submit">{{ __('Sign Up') }}</button>
            </form>
        </div>
    </div>
</div>
