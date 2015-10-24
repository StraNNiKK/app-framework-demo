<?php

class Admin_Catalog_Controller extends App_Controller
{

    public function _init()
    {
        App_Store_Local::getInstance('leftMenu')->set('menuPoint', 'catalog');
    }

    protected function _testSessionSaveObj()
    {
        $sessObj = App_Store_Session::getInstance('testObjSave');
        
        if (! $sessObj->isValidKey('user')) {
            $a = new User();
            $sessObj->set('user', $a);
        }
    }

    public function indexAction()
    {
        $this->_testSessionSaveObj();
    }
}