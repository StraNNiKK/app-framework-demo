<?php

class About_Controller extends App_Controller
{

    public function indexAction()
    {
        $UserModel = new User();
        $count = $UserModel->getCount();
        $this->assignView('count', $count);
    }
}