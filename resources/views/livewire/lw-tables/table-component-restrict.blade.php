<div class="main-content">
    <div class="breadcrumb">
        <h1>{{ __('System') }}</h1>
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
                <div class="col-md" style="text-align: end">
                    <a href="{{ $this->refresh() }}" class="btn btn-warning"><i class="fas fa-sync"></i> <span>{{ __('Reload') }}</span></a>
                    <a href="{{ $this->endpoint() }}" class="btn btn-success"><i class="fas fa-plus"></i> <span>{{ __('New') }}</span></a>
                </div>
            </div>
        </div>
        <!-- Light table -->
    </div>
</div>

