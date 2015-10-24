<?php
$this->head()->appendJs('/js/application/admin/login.js', array(
    'min' => true
));
$this->head()->appendRawJs('
Ext.SSL_SECURE_URL  = \'/i/common/extjs/resources/images/s.gif\'; 
Ext.BLANK_IMAGE_URL = \'/i/common/extjs/resources/images/s.gif\';
var options = ' . json_encode($this->Data['urls']) . ';
var error   = \'' . (isset($this->Data['error']) ? ('<font color="red">' . $this->Data['error'] . '</font>') : '') . '\';');
if ($this->Data['error'] != '') {
    $this->head()->appendCss('/css/application/admin/login.css', array());
}
?>
<div id="loginForm"></div>