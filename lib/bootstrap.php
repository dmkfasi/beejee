<?php

// Local config and settings
require_once 'conf/config.php';

// Composer's autoloader for all the libraries in use
require_once 'vendor/autoload.php';

// Activate Router
require_once 'lib/router.php';

use \SimpleCrud\Database;
use \Aura\View\ViewFactory;

// Core Library objects
$pdo = new PDO(DSN, null, null);
$view_factory = new ViewFactory();

// Founding objects to use
$db = new Database($pdo);
$view = $view_factory->newInstance();

// Main layout for the website
$layout_registry = $view->getLayoutRegistry();
$layout_registry->set('layout', 'views/layout.php');

// View for the Task List
$view_registry = $view->getViewRegistry();
$view_registry->set('task_list', 'views/task_list.php');

// Set default layout and view
$view->setLayout('layout');
$view->setView('task_list');
