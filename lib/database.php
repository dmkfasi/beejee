<?php

use \SimpleCrud\Database;

$db = new Database(new PDO(DB_DSN, DB_USER, DB_PASS));

// Adds Database object to the registry for further use
registry::addService('db', $db);