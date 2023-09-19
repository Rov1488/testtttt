<?php


namespace app\controllers;


use app\models\Category;

class CategoryController extends AppController
{
    public function indexAction(){

        $orders = \R::getAll("SELECT * from orders where status = 'Shipped'");
        $buyPrice = '48';
        $products = \R::getAssoc("SELECT * from products limit 10");
        $this->set([
            'orders' => $orders,
            'products' => $products
            ]);

    }
}