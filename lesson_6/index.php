<?php
require __DIR__. '/config/url.php';
require __DIR__. '/autoload.php';

global $user;
$user = new User();
$user->loadSession();

//$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'news';
$ctrlClassName = ucfirst($ctrl) . 'Controller';
//$method = !empty($_GET['method']) ? $_GET['method'] : 'AllShow';
$methodName = 'action' . $method;

try {
    $controller = new $ctrlClassName;
    $controller->$methodName();
} catch (E404Exception $e) {
    echo $e->viewE404();
} catch (E403Exception $e) {
    echo $e->viewE404();
}