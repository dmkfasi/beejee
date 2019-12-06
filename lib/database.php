<?php

use \SimpleCrud\Database;
$pdo = new PDO(DSN, null, null);
$db = new Database($pdo);
