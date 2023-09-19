<?php
/**
 * Created by PhpStorm.
 * User: r.pulatov
 * Date: 25.11.2019
 * Time: 18:54
 */

namespace app\controllers;

use myfream\App;
use myfream\Cache;

class SiteController extends AppController{

    public  function indexAction(){

        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание...', 'Ключевие слова..');

    }
}