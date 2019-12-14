<?php

use Aura\Auth\Adapter\AdapterInterface;
use Aura\Auth\Auth;
use Aura\Auth\Status;

class AuraCustomAdapter implements AdapterInterface
{
    private $db = null;

    public function __construct()
    {
        $this->db = registry::getService('db');
    }

    // AdapterInterface::login()
    public function login(array $input)
    {
        if ($this->isLegit($input)) {
            $userdata = [
                'id' => $this->userid,
            ];
            $this->updateLoginTime(time());

            return array($this->username, $userdata);
        } else {
            throw new \Exception('Unauthenticated');
        }
    }
    
    // AdapterInterface::logout()
    public function logout(Auth $auth, $status = Status::ANON)
    {
        $this->updateLogoutTime($auth->getUsername(), time());
    }
    
    // AdapterInterface::resume()
    public function resume(Auth $auth)
    {
        $this->updateActiveTime($auth->getUsername(), time());
    }
    
    // custom support methods not in the interface
    protected function isLegit($input)
    {
        $user = $this->db->user
            ->select()
            ->where('name = ', $input['username'])
            ->where('password = ', $input['password'])
            ->one()
            ->get();

        // Queried exactly for one record, let's check it
        if ($user === null) {
            return false;
        } else {
            $this->userid   = $user->id;
            $this->username = $user->name;
            return true;
        }
    }
    
    protected function updateLoginTime($time)
    {
        ;
    }
    
    protected function updateActiveTime($time)
    {
        ;
    }
    
    protected function updateLogoutTime($time)
    {
        ;
    }

}