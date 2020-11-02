<?php

abstract class Product {
    protected $name;
    public $price;

    protected static int $income = 0;

    function __construct($name = null, $price = 0)
    {
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function sell($quantity);

    public function print_income()
    {
        echo "Общий доход со всех товаров составил " . self::$income;
    }
}

class IT_product extends Product {
    function __construct($r_product)
    {
        $this->name = $r_product->name;
        $this->price = $r_product->price;
    }

    public function sell($quantity)
    {
        parent::$income = parent::$income + ($quantity * $this->price * 0.5);
    }
}

class Real_product extends Product {
    public function sell($quantity)
    {
        parent::$income = parent::$income + ($quantity * $this->price);
    }
}

class Weight_product extends Product {
    public function get_final_price($weight)
    {
        if ($weight < 3)
        {
           return $this->price;
        }
        elseif ($weight >= 3 and $weight < 6)
        {
            return $this->price * 0.6;
        }
        else
        {
            return $this->price * 0.3;
        }
    }

    public function sell($weight)
    {
        parent::$income = parent::$income + ($weight * $this->get_final_price($weight));
    }
}

$r_phone = new Real_product("Xiaomi Redmi Note 8Pro", 16000);
$it_phone = new IT_product($r_phone);
$w_nails = new Weight_product("Гвозди", 400);

$it_phone->sell(3);
$r_phone->sell(3);
$w_nails->sell(3);

$it_phone->print_income();