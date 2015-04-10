<?php
function __autoload($className){
    require_once __DIR__ . "class/" . $className . ".class.php";
}