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
        extract($this->data);

        ob_start();
        include($this->path . '/' . $template . '.php');
        $contents = ob_get_contents();
        ob_end_clean();
        $contents = preg_replace('/<copyright>/i', '&copy; Author 2015', $contents);
        echo $contents;
    }
} 