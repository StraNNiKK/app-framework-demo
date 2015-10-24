<?php

class Index_Controller extends App_Controller
{

    public function indexAction()
    {
        $UserModel = new User();
        $users = $UserModel->fetchAll()->toArray();
        
        /*
         * $a = new Library_Resource();
         * $a->appendRawJs();
         * $a->appendRawJs()
         * $a = $this->getSStore('user');
         * $a->set('w'=7);
         * $a->get('var');
         */
    }
}