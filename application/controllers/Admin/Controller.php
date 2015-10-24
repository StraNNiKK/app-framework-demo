<?php

class Admin_Controller extends App_Router
{

    public function run()
    {
        if (Auth::getInstance()->getIdentity()) {
            parent::run();
        } else {
            $this->_response->redirect($this->_router->backRoute('Admin_Login_Controller'));
        }
    }
}