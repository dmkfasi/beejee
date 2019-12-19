<?php

// Local config and settings
require_once 'conf/config.php';

// Composer's autoloader for all the libraries in use
require_once 'vendor/autoload.php';

// Core Library objects
// TODO Decouple everything, use a container and stuff
require_once 'lib/registry.php';
require_once 'lib/database.php';
require_once 'lib/AuraCustomAdapter.php';
require_once 'lib/auth.php';
require_once 'lib/view.php';
require_once 'lib/router.php';

function debug($o) {
    die(var_dump($o));
}