<?php


namespace Call\Menus;


use Illuminate\Support\Facades\Route;

class Menu
{
    use CallRoute;

    protected $items = [];
    protected $label;
    protected $icon = "i-Arrow-Forward-2";
    protected $route;
    protected $sorting = 0;

    /**
     * Menu constructor.
     * @param $label
     */
    public function __construct($label)
    {

        $this->label = $label;
    }

    public static function meke($label){

        return new static($label);
    }

    public function add(Item $item){
        $this->items[] = $item;
        return $this;
    }


    /**
     * @param $icon
     * @return $this
     */
    public function icon($icon){
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param $route
     * @return $this
     */
    public function route($route){

        $this->route = $route;

        return $this;
    }

    public function permissions(){
        $permissions = [];
        if($this->items){
            foreach ($this->items as $item) {
                if(auth()->user()->can($item->route)):
                    $permissions[] = $item->route;
               endif;
            }
        }
        return array_filter($permissions);
    }
    public function all(){

        return [
            'label'=>$this->label,
            'route'=>$this->route,
            'icon'=>$this->icon,
            'items'=>$this->items
        ];
    }

    public function items(){

        return $this->items;
    }


    public function isRoute(){

        if(Route::has($this->route))
            return  route($this->route);

        return "#";
    }

    public function sort($sort){
        $this->sorting = $sort;
        return $this;
    }

    public function isMenu()
    {
        return count($this->items()) <= 1;
    }

    public function name()
    {
        return $this->route;
    }
    public function __get($name)
    {
        return $this->{$name};
    }
}
