<?php


namespace Call\Menus;


class Menu
{

    protected $items = [];
    protected $label;
    protected $icon = "";
    protected $route;

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

        $permissions[] = $this->route;

        if($this->items){
            foreach ($this->items as $item) {
                $permissions[] = $item->route();
            }
        }
        return $permissions;
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

    public function __get($name)
    {
        return $this->{$name};
    }
}
