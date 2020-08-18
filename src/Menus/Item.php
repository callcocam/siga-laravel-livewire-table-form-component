<?php


namespace Call\Menus;


use Illuminate\Support\Facades\Route;

class Item
{
    public $label;
    protected $icon = "i-Arrow-Forward-2";
    protected $route;

    /**
     * Item constructor.
     * @param $label
     */
    public function __construct($label)
    {
        $this->label = $label;
    }

    public static function make($label){

        return new static($label);
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


    public function all(){

        return [
            'label'=>$this->label,
            'route'=>$this->route,
            'icon'=>$this->icon
        ];
    }

    public function isRoute(){

        if(Route::has($this->route))
            return  route($this->route);

        return "#";
    }


    public function __get($name)
    {
        return $this->{$name};
    }
}
