<?php

namespace app\model;

class Users extends DBModel
{
    public $id;
    public $login;
    public $pass;

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function getTableName() {
        return "users";
    }
}