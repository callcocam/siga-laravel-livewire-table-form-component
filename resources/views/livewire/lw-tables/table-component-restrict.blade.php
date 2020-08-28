<div class="main-content">
    <div class="breadcrumb">
        <h1>@isset($tenant) {{ $tenant->name }} @else {{ __("System") }} @endisset</h1>
        <ul>
            <li><a href="{{ route('admin') }}">{{ __('Dashboard') }}</a></li>
            <li>{{ $this->getTitle() }}</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <h2>{{ $this->getTitle() }}</h2>
                </div>
            </div>
        </div>
        <!-- Light table -->
    </div>
</div>

