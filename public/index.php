<?php

use Root\Controller\IndexController;

ini_set('display_errors', 1);

require '../vendor/autoload.php';

session_start();

$routes = include_once '../config/routes.php';

include_once '../config/database.php';

$url = explode('?', $_SERVER['REQUEST_URI'])[0];

if (!isset($routes[$url])) {
  (new IndexController)->notFoundAction();

  exit;
}

$controller = $routes[$url]['controller'];
$action = $routes[$url]['action'];

(new $controller)->$action();
