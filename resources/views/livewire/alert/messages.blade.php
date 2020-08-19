@if (session()->has('success'))
    <div class="alert alert-success">
        <strong>{{ __('Oppss!!') }}</strong>{{ session()->get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('warning'))
    <div class="alert alert-warning alert-dismissible">
        <strong>{{ __('Oppss!!') }}</strong> {{ session()->get('warning')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('info'))
    <div class="alert alert-info alert-dismissible">
        <strong>{{ __('Oppss!!') }}</strong> {{ session()->get('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible">
        <strong>{{ __('Oppss!!') }}</strong> {{ session()->get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('primary'))
    <div class="alert alert-primary alert-dismissible">
        <strong>{{ __('Oppss!!') }}</strong> {{ session()->get('primary')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
