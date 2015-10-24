<?php

class Event_System
{

    static public function beforeRoute($observable)
    {
        console('beforeRoute');
    }

    static public function afterRouteBeforeController($observable, $param1, $param2)
    {
        console('afterRouteBeforeController: ' . $param1 . ' - ' . $param2);
    }

    static public function afterControllerBeforeTemplate($observable)
    {
        console('afterControllerBeforeTemplate');
    }

    static public function afterTemplate($observable)
    {
        console('afterTemplate');
    }
}