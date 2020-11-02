<?php

include "../config/config.php";
use app\model\{Products, Users};
use app\engine\{DB, Autoload};
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Products(new DB());
$user = new Users(new DB());

echo $product->first(5);
echo $user->get();


var_dump($product);