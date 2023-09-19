<?php
/**
It is front controllers
 */
require_once dirname(__DIR__). '/config/init.php';
require_once  LIBS . '/functions.php';
require_once CONF . '/routes.php';
new \myfream\App();

//throw new Exception('Страница не найдена', 404);

\myfream\Router::getRoutes();