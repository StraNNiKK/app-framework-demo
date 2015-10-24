<?php

class App_Helper_Admin_Menu
{

    protected $_points = array(
        'catalog' => array(
            'url' => '/admin/catalog/',
            'title' => 'Каталог'
        ),
        'gallery' => array(
            'url' => '/admin/gallery/',
            'title' => 'Галерея'
        ),
        'about' => array(
            'url' => '/admin/about/',
            'title' => 'Информация'
        ),
        'logout' => array(
            'url' => '/admin/logout/',
            'title' => 'Выход'
        )
    );

    public function run()
    {
        $menuPoint = App_Store_Local::getInstance('leftMenu')->get('menuPoint');
        
        $html = '<ul class="avmenu">';
        
        foreach ($this->_points as $key => $point) {
            $html .= '<li><a ' . ($key == $menuPoint ? 'class="current" ' : '') . 'href="' . $point['url'] . '">' . $point['title'] . '</a></li>';
        }
        
        $html .= '</ul>';
        
        return $html;
    }
}