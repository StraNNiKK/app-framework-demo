<?php

set_include_path('.' . PATH_SEPARATOR . '../application/library'
                     . PATH_SEPARATOR . '../application/controllers'
                     . PATH_SEPARATOR . get_include_path());

// define boot path
defined('BOOT_PATH') || define('BOOT_PATH', getcwd());

// define path to application directory
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

require_once '../vendor/autoload.php';

// create application and run
$application = new App_Application(APPLICATION_PATH . '/configs/application.php');
$application->run();