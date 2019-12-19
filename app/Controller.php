<?php

namespace App;

class Controller
{

    protected $db   = null;
    protected $view = null;
    protected $auth = null;

    public function __construct()
    {
        $this->db   = \registry::getService('db');
        $this->view = \registry::getService('view');
        $this->auth = \registry::getService('auth');
    }

    // TODO Move this to some Utils class
    public static function getSessionMessage(string $section, bool $removeIt = true): ?string
    {
        if (isset($_SESSION[$section])) {
            $message = $_SESSION[$section];

            // Clean this up upon request
            if ($removeIt) {
                self::clearSessionMessage($section);
            }

            return $message;
        } else {
            return false;
        }
    }

    public static function setSessionMessage(string $section, string $message): void
    {
        $_SESSION[$section] = $message;
    }

    public static function clearSessionMessage(string $section): void
    {
        unset($_SESSION[$section]);
    }
}
