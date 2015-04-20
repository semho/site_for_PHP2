<?php

abstract class AbstractController {

    protected $view;
    protected  $newsModel;

    public function __construct(){
        $this->newsModel = new NewsArticle;
        $this->view = new View($this->path);
    }

} 