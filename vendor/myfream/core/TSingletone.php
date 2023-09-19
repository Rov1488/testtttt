<?php
/**
 * Created by PhpStorm.
 * User: r.pulatov
 * Date: 23.11.2019
 * Time: 20:54
 */

namespace myfream;


trait TSingletone
{
    private static $instance = null;

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}