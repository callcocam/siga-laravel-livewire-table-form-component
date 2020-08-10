@if ($tableFooterEnabled)
    <tfoot class="{{ $tableFooterClass }}">
    @include('lw-tables::includes._columns')
    </tfoot>
@endif
