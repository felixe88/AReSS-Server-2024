<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */
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
    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
