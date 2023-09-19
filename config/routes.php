<?php
/* Конфигурационный файл для маршрутизации
*/
use myfream\Router;

/*Router::add('^product/(?P<action>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'index']);
Router::add('^category/(?P<action>[a-z0-9-]+)/?$', ['controller' => 'Category', 'action' => 'view']);*/

// default routes for admin
Router::add('^admin$', ['controller' => 'Site', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

// default routes for users
Router::add('^$', ['controller' => 'Site', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');