<?php


namespace Call\Menus;


abstract class AbstractMenu
{

    protected $menus;

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
}
