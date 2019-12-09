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
$map->get('task', '{/controller,action,id}')
    ->defaults([
        'controller' => 'task',
        'action' => 'list',
        'id' => null,
    ]);

// Resource based router
$map->attach('task', '/task', function ($map) {
    $map->get('list', '/{page}');
    $map->get('add', '');
	$map->post('save', '');
	$map->get('read', '/{id}');
	$map->patch('edit', '/{id}');
	$map->delete('delete', '/{id}');
});

// get the route matcher from the container ...
$matcher = $router->getMatcher();

// .. and try to match the request to a route.
$route = $matcher->match($request);
if (! $route) {
    // Display neat error page
	$view = registry::getService('view');
	$view->setView('error_404');
	die($view->__invoke());
}

// dispatch the request to the route handler.
// (consider using https://github.com/auraphp/Aura.Dispatcher
// in place of the one callable below.)
$actionClass = ucfirst($route->handler) . 'Controller';
$classFile = "app/{$actionClass}.php";

// Checks and loads up controller requested
if (is_readable($classFile)) {
	require_once $classFile;

	// Instantiates controller requested
	$object = new $actionClass();
	$method = $route->attributes['action'];

	// Calls a method specified in HTTP request
	$contents = $object->$method();

	// Spit out contents from the controller
	header('Content-type: text/html; encoding=utf-8');
	header('Content-Length: ' . mb_strlen($contents, 'UTF-8'));
	die($contents);
} else {
	throw new \Exception('No application specified found');
}
