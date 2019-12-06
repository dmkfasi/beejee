<?php

use \Aura\View\ViewFactory;

$view_factory = new ViewFactory();

// Founding objects to use
$view = $view_factory->newInstance();

// Main layout for the website
$layout_registry = $view->getLayoutRegistry();
$layout_registry->set('layout', 'views/layout.php');

// View for the Task List
$view_registry = $view->getViewRegistry();
$view_registry->set('task_list', 'views/task_list.php');
$view_registry->set('task_add', 'views/task_add.php');

// Set default layout and view
$view->setLayout('layout');
$view->setView('task_list');

