<?php
/*
App контроллер
 */

namespace app\controllers;


use app\models\AppModel;
use app\widgets\currency\Currency;
use myfream\App;
use myfream\base\Controller;
use myfream\Cache;

class AppController extends Controller{

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        /*App::$app->setProperty('currencies', Currency::getCurrencies());
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));*/

       // App::$app->setProperty('cats', self::cacheCategory());

    }

    //Метод для записи категории меню в кеш из БД
    public static function cacheCategory(){
       /* $cache = Cache::instance();
        $cats = $cache->get('cats');
        if(!$cats){
            $cats = \R::getAssoc("SELECT * FROM productlines");
            $cache->set('cats', $cats);
        }
        return $cats;*/

    }

    public function getRequestID($get = true, $id = 'id'){
        if($get){
            $data = $_GET;
        }else{
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? $data[$id] : null;
        if(!$id){
            throw new \Exception('Страница не найдена', 404);
        }
        return $id;
    }

}