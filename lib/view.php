<?php

use \Aura\View\ViewFactory;

$view_factory = new ViewFactory();
$view = $view_factory->newInstance();

$helpers = $view->getHelpers();
$helpers->set('user_auth', function(){
    return new UserController;
});

// Main layout for the website
$layout_registry = $view->getLayoutRegistry();
$layout_registry->set('layout', 'views/layout.php');

// Register view list
$view_registry = $view->getViewRegistry();

$view_registry->set('task_list', 'views/task_list.php');
$view_registry->set('task_add', 'views/task_add.php');

$view_registry->set('user_auth', 'UserController@getStatus');
$view_registry->set('user_login', 'views/user_login.php');
$view_registry->set('user_logout', 'views/user_logout.php');

$view_registry->set('error_404', 'views/error_404.php');
$view_registry->set('error_500', 'views/error_500.php');

// Set default layout and view
$view->setLayout('layout');

// Add ViewFactory object to the registry for further use
registry::addService('view', $view);