<?php

namespace app\model;

class Users extends Model
{
    public $id;
    public $login;
    public $pass;

//    protected $tableName = 'users';
    public function getTableName()
    {
        return "products";
    }
}