<?php

class E404Exception
    extends  Exception
{

    public $message;
    public $view;

    public function __construct($message)
    {
        $this->message = $message;
        $this->view = new View(__DIR__ . '/../Views/errors/');
    }

    final function viewE404()
    {
        $this->view->items = $this->message;
        $this->view->display('e404');
    }
} 