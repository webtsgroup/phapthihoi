<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Administrator',
    ['path' => '/administrator'],
    function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Dashboards', 'action' => 'index', 'home']);
        $routes->fallbacks('DashedRoute');
    }
);
