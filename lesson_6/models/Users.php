<?php

class Users
    extends Model
{
    protected static $table = 'users';

    public $login;
    public $password;
    public $id;
}