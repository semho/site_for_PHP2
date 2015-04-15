<?php

require_once __DIR__ . '/../models/NewsArticle.php';

abstract class AbstractController
{
    protected $arParams;
    public  $newsModel;

    abstract protected function getTemplatePath();

    public function __construct()
    {
        $this->newsModel = new NewsArticle;
    }

    protected function render($template, $data)
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        require $this->getTemplatePath() . '/' . $template . '.php';
    }

} 