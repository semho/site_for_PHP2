<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
If($uri =='/')
{
    $ctrl = 'news';
    $method = 'AllShow';
}
else
{
    $uri = trim($uri,'/');
    $uri_elements = explode('/',$uri);
    $ctrl = $uri_elements[0];

    if (!empty($uri_elements[1]))
    {
        $method = $uri_elements[1];

    }
    else
    {
        $method = 'AllShow';
    }
}