<?php

// Include suggested helpers
include_once 'vendor/pecee/simple-router/helpers.php';

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('App');

// Default route as per description
SimpleRouter::get('/', 'TaskController@index');

// Resource controller based route
SimpleRouter::resource('task', TaskController::class);

SimpleRouter::post('setDone', 'TaskController@setDone')->name('task.setDone');

// User Authentication route
SimpleRouter::get('/user/login',    'UserController@login')->name('user.login');
SimpleRouter::get('/user/logout',   'UserController@logout')->name('user.logout');
SimpleRouter::post('/user/auth',    'UserController@auth')->name('user.auth');

SimpleRouter::start();
