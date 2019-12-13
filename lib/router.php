<?php

// Include suggested helpers
include_once 'vendor/pecee/simple-router/helpers.php';

use Pecee\SimpleRouter\SimpleRouter;

// Default route as per description
SimpleRouter::get('/', 'TaskController@index');

// Resource controller based route
SimpleRouter::resource('task', TaskController::class);

SimpleRouter::controller('task/page/{id}', 'TaskController@index');

SimpleRouter::start();
