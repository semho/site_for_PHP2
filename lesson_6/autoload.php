<?php

function __autoload($class)
{
    $paths = [
        __DIR__ . '/Classes',
        __DIR__ . '/Controllers',
        __DIR__ . '/Models'
    ];

    foreach ($paths as $path) {
        $fileName = $path . '/' . $class . '.php';
        if (file_exists($fileName)){
            require $fileName;
            return true;
        }
    }

    throw new E404Exception('404. Не найдено.');
}