@if ($tableHeaderEnabled)
    <thead class="{{ $tableHeaderClass }}">
    @include('lw-tables::includes._columns')
    </thead>
@endif
