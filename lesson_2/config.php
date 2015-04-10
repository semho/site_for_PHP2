<?php
function __autoload($className){
    require_once __DIR__ . "/model/" . $className . ".php";
}