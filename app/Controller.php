<?php

use \SimpleCrud\Database;

class Controller {

    protected $db = null;
    protected $view = null;

    public function __construct() {
        $this->db = registry::getService('db');
        $this->view = registry::getService('view');
    }

}