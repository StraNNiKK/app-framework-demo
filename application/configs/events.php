<?php

/**
 * System events
 */
return array(
    'beforeRoute' => array(
        'class' => 'Event_System',
        'method' => 'beforeRoute',
        'params' => array()
    ),
    'afterRouteBeforeController' => array(
        'class' => 'Event_System',
        'method' => 'afterRouteBeforeController',
        'params' => array(
            'test1',
            'test2'
        )
    ),
    'afterControllerBeforeTemplate' => array(
        'class' => 'Event_System',
        'method' => 'afterControllerBeforeTemplate',
        'params' => array()
    ),
    'afterTemplate' => array(
        'class' => 'Event_System',
        'method' => 'afterTemplate',
        'params' => array()
    )
);