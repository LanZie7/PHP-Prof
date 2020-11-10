<?php

namespace app\model;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    public function __set($name, $value)
    {
        //TODO проверить по props есть ли такое поле
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        //TODO проверить по props есть ли такое поле
        return $this->$name;
    }


}