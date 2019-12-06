<?php

// Bootstrap everything in use
require_once 'lib/bootstrap.php';

//To get any table, use magic properties, they will be instantiated on demand:
$tasks = $db->task;

$view->setData($tasks);

echo $view->__invoke();
