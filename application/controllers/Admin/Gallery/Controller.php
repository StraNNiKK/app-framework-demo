<?php

class Admin_Gallery_Controller extends App_Controller
{

    public function _init()
    {
        App_Store_Local::getInstance('leftMenu')->set('menuPoint', 'gallery');
    }

    public function indexAction()
    {
        $memoryStore = App_Store_Memory::getInstance('testStore');
        $val = $memoryStore->get('test', true);
        
        if ($val) {
            $this->_data['valInMemoryStore'] = $val;
        } else {
            $memoryStore->set('test', time());
            $this->_data['valInMemoryStore'] = 'the value was saved';
        }
    }
}