<?php

class Admin_About_Controller extends App_Controller
{

    public function _init()
    {
        App_Store_Local::getInstance('leftMenu')->set('menuPoint', 'about');
    }

    protected function _testSessionSaveObj()
    {
        $sessObj = App_Store_Session::getInstance('testObjSave');
        
        $a = null;
        
        if ($sessObj->isValidKey('user')) {
            $a = $sessObj->get('user');
        }
        
        return $a;
    }

    public function indexAction()
    {
        $this->_data['sessObj'] = $this->_testSessionSaveObj();
        $this->_layoutData['title'] = 'About';
    }
}