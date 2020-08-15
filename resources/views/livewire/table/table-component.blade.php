<div class="container mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Light table</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    @if (is_numeric($refresh))
                        <div class="{{ $wrapperClass }}" wire:poll.{{ $refresh }}.ms>
                            @elseif (is_string($refresh))
                                <div class="{{ $wrapperClass }}" wire:poll="{{ $refresh }}">
                                    @else
                                        <div class="{{ $wrapperClass }}">
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
        </div>
    </div>
</div>
