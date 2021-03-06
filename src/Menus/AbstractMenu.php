<?php


namespace Call\Menus;


abstract class AbstractMenu
{

    protected $show = true;
    protected $menus;
    protected $sorting = 0;

    /**
     * @param Menu $menu
     */
    protected function add(Menu $menu){
        $this->menus = $menu;
        return $this;
    }

    public function getMenus(){

        return $this->menus;
    }

    public function sort($sort){

        return $this->sorting;
    }

    public function show($show){

        $this->show = $show;

        return $this;
    }

    public function isShow(){
        return $this->show;
    }
}
