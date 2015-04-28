<?php

function __autoload($class)
{
    if (false !== strpos($class, '\\')) {
        $classNameParts = explode('\\', $class);
        if ('App' == $classNameParts[0]) {
            unset ($classNameParts[0]);
            $fileName = __DIR__ . '/' . implode('/', $classNameParts) . '.php';
            if (file_exists($fileName)) {
                require $fileName;
                return true;
            }
        }
    }

    $paths = [
        __DIR__ . '/classes',
        __DIR__ . '/Controllers',
        __DIR__ . '/odels'
    ];

    foreach ($paths as $path) {
        $fileName = $path . '/' . $class . '.php';
        if (file_exists($fileName)) {
            require $fileName;
            return true;
        }
    }

    return false;
}