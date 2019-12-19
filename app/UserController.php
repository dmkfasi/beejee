<?php

namespace App;

class UserController extends Controller
{

    // Don't want anyone else to access these services at the moment
    private $auth_login = null;
    private $auth_logout = null;

    public function __construct()
    {
        parent::__construct();

        $this->auth_login   = \registry::getService('auth_login');
        $this->auth_logout  = \registry::getService('auth_logout');
    }

    public function login(): string
    {
        $this->view->setView('user_login');
        return $this->view->__invoke();
    }

    public function logout(): void
    {
        self::setSessionMessage('user_login_message', 'Logged out');
        $this->auth_logout->logout($this->auth);

        redirect(url('/'), 301);
    }

    public function auth(): void {
        // TODO Extra validation and sanitization
        $values = input()->all([
            'username',
            'password',
        ]);

        try {
            $this->auth_login->login($this->auth, filter_var_array($values, [
                'username'  => FILTER_SANITIZE_ENCODED,
                'password'  => FILTER_SANITIZE_ENCODED,
            ]));

            self::setSessionMessage('user_login_message', "Welcome, {$this->auth->getUserName()}");
        } catch (\Exception $e) {
            // TODO Handle the error saving
            self::setSessionMessage('user_login_message', "Unable to login: {$e->getMessage()}");
            redirect(url('user.login'), 302);
        }

        redirect(url('/'), 301);
    }

    public function isValid()
    {
        return $this->auth->isValid();
    }
}
