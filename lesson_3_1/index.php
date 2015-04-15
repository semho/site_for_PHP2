<?php

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'news';
$ctrlClassName = ucfirst($ctrl) . 'Controller';
$act = !empty($_GET['act']) ? $_GET['act'] : 'AllShow';
$method = 'action' . $act;

$id = !empty($_GET['id'])? $_GET['id'] : '';
$title = !empty($_POST['title'])? $_POST['title'] : '';
$text = !empty($_POST['text'])? ',' . $_POST['text'] : '';

require __DIR__ . '/controllers/' . $ctrlClassName . '.php';

$controller = new $ctrlClassName;
eval("\$controller->".$method."(".$id."".$title."".$text.");");
