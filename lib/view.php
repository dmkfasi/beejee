<?php

use \Aura\View\ViewFactory;

$view_factory = new ViewFactory();
$view = $view_factory->newInstance();

// Main layout for the website
$layout_registry = $view->getLayoutRegistry();
$layout_registry->set('layout', 'views/layout.php');

// View for the Task List
$view_registry = $view->getViewRegistry();

// Register view list
$view_registry->set('task_list', 'views/task_list.php');
$view_registry->set('task_add', 'views/task_add.php');

// Register error list
$view_registry->set('error_404', 'views/error_404.php');
$view_registry->set('error_500', 'views/error_500.php');

// Set default layout and view
$view->setLayout('layout');
$view->setView('task_list');

// Adds ViewFactory object to the registry for further use
registry::addService('view', $view);