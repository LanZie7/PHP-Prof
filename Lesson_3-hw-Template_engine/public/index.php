<?php
//TODO сделать все пути абсолютными
include "../config/config.php";

use app\model\{Products, Users};
use app\engine\Autoload;
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    die("Ошибка, контроллер не существует.");
}

die();

//$product = new Products();
//$users = new Users();

//CRUD

/** @var Products $product */

//UPDATE
$product = Products::first(2);
$product->name = "Чай 2";
$product->save();
var_dump($product);
die();

/** @var Users $user */

//READ
$user1 = new Users("user1", "12345");
$user1->save();
var_dump($user1);
die();

//CREATE
$prodNew1 = new Products('Конфеты','шоколадные', 150);
$prodNew1->save();
//$users->insert();
//var_dump(get_class_methods($users));
var_dump($prodNew1);
die();

//DELETE
$product = $product->first(1);
$product->delete();


$product = $product->first(1);
var_dump($product->get());

