<?php
return array(
    'errors' => array(
        'error_reporting' => E_ALL | E_STRICT,
        'display_errors' => 1,
        'display_startup_errors' => 0,
        'log_errors' => 1,
        'error_log' => APPLICATION_PATH . '/../data/logs/php-error.log',
        'output_in_headers' => 1
    ),
    'debug' => array(
        'enable' => true,
        'toolbar' => array(
            'enable' => true,
            'data'   => array(
                'files',
                'memory',
                'time',
                'phptime',
                'errors',
                'database',
                'console'
            )
        )
    ),
    'default_timezone' => 'UTC',
    'includePathes' => array(
        '../application/models'
    ),
    'response' => array(
        'defaultCharset' => 'utf-8'
    ),
    'autoload' => array(
        'enable' => true
    ),
    'router' => array(
        'config' => APPLICATION_PATH . '/configs/router.php',
        'controllerPostfix' => 'Controller',
        'actionPostfix' => 'Action',
        
        'defaultController' => 'index',
        'defaultAction' => 'index',
        
        '404' => array(
            'defaultController' => 'error',
            'defaultAction' => 'pageNotFound'
        ),
        '500' => array(
            'defaultController' => 'error',
            'defaultAction' => 'pageNotFound'
        )
    ),
    'events' => array(
        'config' => APPLICATION_PATH . '/configs/events.php'
    ),
    'templates' => array(
        'path' => APPLICATION_PATH . '/templates',
        'helperPath' => APPLICATION_PATH . '/templates/helpers',
        'defaultTemplate' => '_default'
    ),
    'db' => array(
        'apptest' => array(
            'adapter' => 'PDO_MYSQL',
            'host' => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'dbname' => 'app-framework-test',
            'charset' => 'UTF8'
        )
    ),
    'store' => array(
        'local' => array(
            'defaultNamespace' => '_default'
        ),
        'session' => array(
            'autostart' => false, // autostart session in App_Application
            'cookieLifeTime' => 1440, // in most cases 'cookieLifeTime' and 'serverSessionLifetime'
            'serverSessionLifetime' => 1440, // should be the same
            'defaultNamespace' => '_default',
            'handler' => null
            // 'handler' => 'App_Session_Handler_ZendDb',
            // 'tableName' => 'session'
        ),
        'memory' => array(
            'lifetime' => null,
            'handler' => 'App_Store_Memory_ZendModel',
            'tableName' => 'memoryStore'
        )
    ),
    'resourses' => array(
        'common' => array(
            'public' => APPLICATION_PATH . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public'
        ),
        'js' => array(
            'min' => 'App_Resource_Min_Jsmin',
            // 'min' => 'App_Resource_Min_Closurecompiler',
            // 'min' => 'App_Resource_Min_None',
            // 'closurecompiler_path' => APPLICATION_PATH . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'closurecompiler.jar'
            'autoMin' => false,
            'cache' => '/cache/js/',
            'store' => null,
            'autoRemoveOldFiles' => false
        ),
        'css' => array(
            'min' => null,
            'autoMin' => false,
            'cache' => '/cache/css/',
            'store' => null,
            'autoRemoveOldFiles' => false
        )
    )
);