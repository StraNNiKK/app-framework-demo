<?php

class App_Helper_Pagetitle
{

    public function run($h1 = null, $h2 = null)
    {
        $html = '<h1>' . $h1 . '</h1><h2>' . $h2 . '</h2>';
        return $html;
    }
}