<?php

abstract class AbstractController {

    protected $view;

    public function __construct(){
        $this->view = new View($this->path);
        $this->user = new User();
    }

} 