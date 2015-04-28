<?php

class User
    extends Model
{
    protected static $table = 'users';

    public $login;
    public $password;
    public $access;
    public $id;

    public function isAdmin() {
       return ($this->access == 1);
    }
    public function saveSession()
    {
        $_SESSION['user']['id'] = $this->id;
        $_SESSION['user']['login'] = $this->login;
    }
    public function loadSession()
    {
        if($_SESSION['user']['id'] > 0) {
            $this->id = $_SESSION['user']['id'];
            $res = User::findOne($this->id);
            $this->login = $res->login;
            $this->access = $res->access;
            return true;
        }
        return false;
    }

}