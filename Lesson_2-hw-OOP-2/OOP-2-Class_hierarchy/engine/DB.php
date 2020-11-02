<?php

namespace app\engine;

class DB
{
    public function queryOne($sql)
    {
        //выполняем запрос
        return $sql . "<br>";
    }

    public function queryAll($sql)
    {
        return $sql . "<br>";
    }
}