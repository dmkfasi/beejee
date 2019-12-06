<?php

require_once 'conf/config.php';
require_once 'vendor/autoload.php';

use SimpleCrud\Database;

$pdo = new PDO(DSN, null, null);

$db = new Database($pdo);

//To get any table, use magic properties, they will be instantiated on demand:
$task = $db->task;

var_dump($task);
