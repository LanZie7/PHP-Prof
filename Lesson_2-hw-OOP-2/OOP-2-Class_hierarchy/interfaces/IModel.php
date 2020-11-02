<?php

 namespace app\interfaces;

interface IModel
{
    public function first($id);
    public function get();
    public function getTableName();
}