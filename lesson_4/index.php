<?php
require __DIR__.'/config/url.php';

$ctrlClassName = ucfirst($ctrl) . 'Controller';
$methodName = 'action' . $method;

require __DIR__ . '/controllers/' . $ctrlClassName . '.php';

$controller = new $ctrlClassName;
$controller->$methodName();