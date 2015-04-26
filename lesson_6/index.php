<?php
require __DIR__. '/config/url.php';
require __DIR__. '/autoload.php';

//$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'news';
$ctrlClassName = ucfirst($ctrl) . 'Controller';
//$method = !empty($_GET['method']) ? $_GET['method'] : 'AllShow';
$methodName = 'action' . $method;

if (isset($_GET['logout']) && $_GET['logout'] == true) {
   unset ($_SESSION['user']['login']);
}

try {
    $controller = new $ctrlClassName;
    $controller->$methodName();
} catch (E404Exception $e) {
    echo $e->viewE404();
}