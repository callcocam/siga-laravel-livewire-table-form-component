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
                <div class="col-md" style="text-align: end">
                    <a href="{{ $this->refresh() }}" class="btn btn-warning"><i class="fas fa-sync"></i> <span>{{ __('Reload') }}</span></a>
                    <a href="{{ $this->endpoint() }}" class="btn btn-success"><i class="fas fa-plus"></i> <span>{{ __('New') }}</span></a>
                </div>
            </div>
        </div>
        <!-- Light table -->
        @if (is_numeric($refresh))
            <div class="{{ $wrapperClass }}" wire:poll.{{ $refresh }}.ms>
                @elseif (is_string($refresh))
                    <div class="{{ $wrapperClass }}" wire:poll="{{ $refresh }}">
                        @else
                            <div class="{{ $wrapperClass }}">
                                @include(alert_views())
                                @endif
                                @include(table_views_includes('_offline'))
                                @include(table_views_includes('_options'))
                                @include(table_views_includes('_loading'))
                                @if (is_string($responsive))
                                    <div class="{{ $responsive }}">
                                        @endif

                                        <table class="{{ $tableClass }}">
                                            @include(table_views_includes('_header'))
                                            @include(table_views_includes('_body'))
                                            @include(table_views_includes('_footer'))
                                        </table>

                                        @if (is_string($responsive))
                                    </div>
                                @endif
                                @include(table_views_includes('_pagination'))
                                @if (is_numeric($refresh))
                            </div>
                            @elseif (is_string($refresh))
                    </div>
            </div>
        @endif
    </div>
</div>

