<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

If($uri =='/lesson_6/')
{
    $ctrl = 'news';
    $method = 'AllShow';
}
else
{
    $uri = trim($uri,'/');
    $uri_elements = explode('/',$uri);
    $ctrl = $uri_elements[1];
    if (!empty($uri_elements[2]))
    {
        $method = $uri_elements[2];
    }
    else
    {
        $method = 'AllShow';
    }
}