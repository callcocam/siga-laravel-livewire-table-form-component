@if ($tableHeaderEnabled)
    <thead class="{{ $tableHeaderClass }}">
    @include(table_views_includes('_columns'))
    </thead>
@endif
