<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {

    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $builder->connect('/pages/*', 'Pages::display');

        $builder->connect('/comunePopolazioneTumoriTest/Query', ['controller' => 'ComunePopolazioneTumoriTest', 'action' => 'Query']);

        $builder->connect('/regioni/query', ['controller' => 'Regioni', 'action' => 'query']);

        $builder->connect('/asl/query', ['controller' => 'Asl', 'action' => 'query']);

        $builder->connect('/comuni/query', ['controller' => 'Comuni', 'action' => 'query']);

        $builder->connect('/distretti', ['controller' => 'Distretti', 'action' => 'index']);

        $builder->connect('/somma-popolazione', ['controller' => 'comunePopolazioneTumoriTest', 'action' => 'sommaPopolazione']);
        
        $builder->connect('/ricevi-dati', ['controller' => 'comunePopolazioneTumoriTest', 'action' => 'riceviDati']);
        
        // $builder->connect('/Combinazioni/riempiColonne', ['controller' => 'Combinazioni', 'action' => 'riempiColonne']);

        // $builder->connect('/query', ['controller' => 'Query', 'action' => 'index']);

        $builder->fallbacks();
    });

    $routes->scope('/', function (RouteBuilder $routes) {
        $routes->setExtensions(['json']); 
        $routes->post('/chart1/handleFilters', ['controller' => 'Chart1', 'action' => 'handleFilters']);
    });
};
