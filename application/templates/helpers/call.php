<?php

class App_Helper_Call
{

    public function run($tplname, $data = null)
    {
        $template = new App_Template($tplname);
        if ($template->isValid()) {
            return $template->out($data);
        }
    }
}