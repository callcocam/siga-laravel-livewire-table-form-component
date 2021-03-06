<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables;


use Call\LivewireAlert\Traits\LivewireAlert;
use Call\LaravelLivewireTables\Traits\{Foreign,
    Checkboxes,
    Kill,
    Loading,
    Offline,
    Pagination,
    WithParameters,
    Search,
    Sorting,
    Table};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

abstract class TableComponent extends Component
{
    use Checkboxes,
        Loading,
        Offline,
        Pagination,
        Search,
        Sorting,
        Table,
        WithParameters,
        WithPagination,
        Foreign,
        LivewireAlert,
        Kill;

    /**
     * The classes applied to the wrapper div.
     *
     * @var string
     */
    public $wrapperClass = '';

    /**
     * The default message delete.
     *
     * @var string
     */
    protected $messagesDelete="Record deleted successfully :)";

    /**
     * Whether or not to refresh the table at a certain interval
     * false is off
     * If it's an integer it will be treated as milliseconds (2000 = refresh every 2 seconds)
     * If it's a string it will call that function every 5 seconds.
     *
     * @var bool|string
     */
    public $refresh = false;

    /**
     * Use constructor instead of mount so that the child classes have access to a mount method that they can accept parameters in.
     *
     * TableComponent constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        parent::__construct($id);

        $this->setTranslationStrings();
    }

    public function mount(){
        if(Gate::denies(Route::currentRouteName())){
            return redirect()->to('admin');
        }
    }
    /**
     * Sets the initial translations of these items.
     */
    public function setTranslationStrings()
    {
        $this->loadingMessage = __('Loading...');
        $this->offlineMessage = __('You are not currently connected to the internet.');
        $this->noResultsMessage = __('There are no results to display for this query.');
        $this->perPageLabel = __('Per Page');
        $this->searchLabel = __('Search...');
    }

    /**
     * @return mixed
     */
    abstract public function query(): Builder;

    abstract public function route();

    /**
     * @return mixed
     */
    abstract public function columns(): array;

    /**
     * @return string
     */
    public function view(): string
    {
        return table_views('table-component');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render(): View
    {
        if(Gate::denies(Route::currentRouteName())){
            return view(table_views('table-component-restrict'));
        }
        $model = null;
        if($this->paginationEnabled)
            $model = $this->models()->paginate($this->perPage);
            else
                $model = $this->models()->get();

        return view($this->view(), [
            'columns' => $this->columns(),
            'models' => $model
        ]);
    }

    /**
     * @return Builder
     */
    public function models(): Builder
    {
        $builder = $this->query();
        if ($this->searchEnabled && trim($this->search) !== '') {
            $builder->where(function (Builder $builder) {
                foreach ($this->columns() as $column) {
                    if ($column->searchable) {
                        if (is_callable($column->searchCallback)) {
                            $builder = app()->call($column->searchCallback, ['builder' => $builder, 'term' => $this->search]);
                        } elseif (Str::contains($column->attribute, '.')) {
                            $relationship = $this->relationship($column->attribute);

                            $builder->orWhereHas($relationship->name, function (Builder $builder) use ($relationship) {
                                $builder->where($relationship->attribute, 'like', '%'.$this->search.'%');
                            });
                        } else {
                            $builder->orWhere($builder->getModel()->getTable().'.'.$column->attribute, 'like', '%'.$this->search.'%');
                        }
                    }
                }
            });
        }

        if (Str::contains($this->sortField, '.')) {
            $relationship = $this->relationship($this->sortField);
            $sortField = $this->attribute($builder, $relationship->name, $relationship->attribute);
        } else {
            $sortField = $this->sortField;
        }

        if (($column = $this->getColumnByAttribute($this->sortField)) !== null && is_callable($column->sortCallback)) {
            return app()->call($column->sortCallback, ['builder' => $builder, 'direction' => $this->sortDirection]);
        }

        return $builder->orderBy($sortField, $this->sortDirection);
    }
}
