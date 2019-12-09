<?php

// Local config and settings
require_once 'conf/config.php';

// Composer's autoloader for all the libraries in use
require_once 'vendor/autoload.php';

// Autoloader for app classes
// Core Library objects
include_once 'lib/registry.php';
require_once 'lib/database.php';
require_once 'lib/view.php';
require_once 'app/Controller.php';
require_once 'lib/router.php';
