<?php

namespace app\engine;

use app\traits\Tsingleton;

class Db
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => 'root',
        'database' => 'shop',
        'charset' => 'utf8'
    ];

    use TSingleton;

    private $connection = null;

    private function getConnection() {
        if (is_null($this->connection)) {
            $this->connection = new \PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']);
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function prepareDsnString() {
         return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
         );
    }

    //SELECT * FROM products WHERE id = :id"
    // ['id' => 1]
    private function query($sql, $params) {
        $proStatement = $this->getConnection()->prepare($sql);
        $proStatement->execute($params);
        return $proStatement;
    }

    public function execute($sql, $params = []) {
        return $this->query($sql, $params);
    }

    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }

    public function queryObject($sql, $params, $class) {
        $proStatement = $this->query($sql, $params);
        $proStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $proStatement->fetch();
    }

    public function queryOne($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }
}