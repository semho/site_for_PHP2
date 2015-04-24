<?php
require __DIR__. '/config/url.php';
require __DIR__. '/autoload.php';

//$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'news';
$ctrlClassName = ucfirst($ctrl) . 'Controller';
//$method = !empty($_GET['method']) ? $_GET['method'] : 'AllShow';
$methodName = 'action' . $method;

require __DIR__ . '/controllers/' . $ctrlClassName . '.php';

try {
    $controller = new $ctrlClassName;
    $controller->$methodName();
} catch (Exception $e) {
    echo 'Ошибка в строке: ' . $e->getLine() . "<br /> " . $e->getMessage();
}