<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Administrator's Login</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">


<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="robots" content="noindex,nofollow" />
<?php
$this->head()
    ->prependCss('/css/common/extjs/ext-all.css', array())
    ->prependCss('/css/layouts/adminlogin.css', array())
    ->prependJs('/js/common/extjs/ext-all.js', array(
    'group' => 'library'
))
    ->prependJs('/js/common/extjs/ext-base.js', array(
    'group' => 'library'
))?>
<?php echo $this->head()->out('css')?>
<?php echo $this->head()->out('js')?>
</head>
<body>
<?php echo $this->Data['content']?>
</body>
</html>