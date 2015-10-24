<?php

class Admin_Logout_Controller extends App_Controller
{

    public function indexAction()
    {
        if (Auth::getInstance()->getIdentity()) {
            $storage = Auth::getInstance()->clearIdentity();
            $this->_response->redirect($this->_router->backRoute('Admin_Login_Controller'));
        }
    }
}