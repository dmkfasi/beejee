<?php

// Copied and pasted from Aura/Router example

// create a server request object
$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// create the router container and get the routing map
$router = new Aura\Router\RouterContainer();
$map = $router->getMap();

// add a route to the map, and a handler for it

// Map default URI to the Task List
$map->get('home', '/', function ($map) {
});

// Resource based router
$map->attach('task', '/task', function ($map) {
	$map->get('browse', '');
	$map->get('add', '');
	$map->post('save', '');
	$map->get('read', '/{id}');
	$map->patch('edit', '/{id}');
	$map->delete('delete', '/{id}');
});

// get the route matcher from the container ...
$matcher = $router->getMatcher();

function taskread() {}

// .. and try to match the request to a route.
$route = $matcher->match($request);
if (! $route) {
	$view->setView('404');
	$view->__invoke();
	exit;
}

// add route attributes to the request
foreach ($route->attributes as $key => $val) {
    $request = $request->withAttribute($key, $val);
}

// dispatch the request to the route handler.
// (consider using https://github.com/auraphp/Aura.Dispatcher
// in place of the one callable below.)
$callable = $route->handler;
$response = $callable($request, $view);
