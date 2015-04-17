<?php

class View
{
    protected $path;
    protected $data = [];
    public function __construct($path)
    {
        $this->path = $path;
    }
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }
    public function __get($k)
    {
        return $this->data[$k];
    }
    public function display($template)
    {
        foreach ($this->data as $k => $v) {
            $$k = $v;
        }
        include($this->path . '/' . $template . '.php');
    }
} 