<?php

namespace app\model;
use app\interfaces\IModel;
use app\engine\DB;

abstract class Model implements IModel
{
    protected $db;
//    protected $tableName ='';

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function first($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id= {$id}";
        return $this->db->queryOne($sql);
    }

    public function get() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName();
}