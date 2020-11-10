<?php

namespace app\controllers;

use app\model\Products;

class ProductController extends Controller
{

    public function actionIndex() {

        //TODO Если нужна пагинация
        $page = $_GET['page'];

        $catalog = Products::get();

        echo $this->render('catalog', [
            'catalog' => $catalog
        ]);
    }

    public function actionCard() {
        $id = (int)$_GET['id'];
        $product = Products::first($id);
        echo $this->render('card', [
            'product' => $product
        ]);
    }

    public function actionApiCatalog() {
        $catalog = Products::get();
        echo json_encode($catalog, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}