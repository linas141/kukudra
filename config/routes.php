<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;


Router::defaultRouteClass(DashedRoute::class);
Router::extensions(['pdf']);
Router::scope('/', function (RouteBuilder $routes) {

    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    $routes->applyMiddleware('csrf');

    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/admin', ['controller' => 'Pages', 'action' => 'display', 'admin']);
    $routes->connect('/darbuotojas', ['controller' => 'Pages', 'action' => 'display', 'employee']);
    $routes->connect('/galerija', ['controller' => 'Pages', 'action' => 'display', 'galerija']);
    $routes->connect('/kontaktai', ['controller' => 'Pages', 'action' => 'display', 'kontaktai']);
    $routes->connect('/user/login', ['controller' => 'User', 'action'=>'login']);
    $routes->connect('/user/forgotpassword', ['controller' => 'User', 'action'=>'forgotpassword']);
    $routes->connect('/user/resetpassword', ['controller' => 'User', 'action'=>'resetpassword']);
	$routes->connect('/profilis', ['controller' => 'User', 'action'=>'profile']);
    $routes->connect('/atsiliepimai', ['controller' => 'Review', 'action'=>'reviews']);
    $routes->connect('/rezervacija', ['controller' => 'Reservation', 'action'=>'addreservation']);
    $routes->connect('/patiekalai', ['controller' => 'Dish', 'action'=>'meniu']);
    $routes->connect('/pasiulymai', ['controller' => 'SpecialOffers', 'action'=>'offers']);


    $routes->fallbacks(DashedRoute::class);
});