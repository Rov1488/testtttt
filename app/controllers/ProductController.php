<?php


namespace app\controllers;


use app\models\Product;
use app\models\Employees;
use myfream\libs\Constanse;
use myfream\libs\Pagination;
use myfream\libs\PageNew;
use myfream\Request;

class ProductController extends AppController
{

    public function indexAction(){


        $product = new Product();
        $columName = $product->getColumnNames();

        $request = new Request();
        $sortAttr = (isset($request->sorType)) ? $request->sorType : 'asc';//тип сортировки из GET параметра "desc" or "asc"
        //$page = $request->page; //текущая страния
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; //номер текущие страницы

        //Pagination setting
        $total = $product->getCount("products");//DB ma'lumotlar soni
        $perpage = Constanse::LIMIT;//bitta betda chiqadigan ma'lumotlar soni
        //$pagination = new Pagination($page, $perpage, $total);//pagination klass
        //$offset = $pagination->getStart();//Метод расчета текущие страници по формуле
        $pagination_1 = new PageNew($page, $perpage, $total);//pagination klass
        $offset_new = $pagination_1->getStart();

        $result = $product->getListSort($offset_new);// kerakli pageda $offset bo'yicha ma'lumot olish


        $this->set(["list" => $result,
            'pagination' => $pagination_1,
            'offset' => $offset_new,
            'total' => $total,
            'sortAttr' =>$sortAttr,
            'columName' => $columName
        ]);

//        $this->view->render("product/lists", ["list" => $result]);
    }

    public function addAction(){
    if (!empty($_POST)){
        $data = $_POST;
        $product  = new Product();
        $product->load($data);

    }

    }

    public function updateAction(){
        $id = (isset($_GET['id']) && !empty($_GET['id'])) ? $_GET['id'] : null;
        try {
            $products = new Product();
            $product = $products->getDataBYtableParams('productCode', $id);
        }catch (\PDOException $e){
            $error = $e->getMessage();
        }
        $this->setMeta('Update product', 'product', 'tekst');
        $this->set(['product' => $product]);
    }

    public function viewAction(){

    }

    public function deleteAction(){

    }


}