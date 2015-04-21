<?php
require __DIR__.'/config/url.php';

//$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'news';
$ctrlClassName = ucfirst($ctrl) . 'Controller';
//$method = !empty($_GET['method']) ? $_GET['method'] : 'AllShow';
$methodName = 'action' . $method;

require __DIR__ . '/controllers/' . $ctrlClassName . '.php';

$controller = new $ctrlClassName;
$controller->$methodName();