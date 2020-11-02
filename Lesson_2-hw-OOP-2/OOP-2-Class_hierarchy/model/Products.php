<?php


namespace app\model;
use app\engine\DB;

class Products extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

//    protected $tableName = 'products';
    public function getTableName()

    {
        return "products";
    }
}