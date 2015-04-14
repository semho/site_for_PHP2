<?php

require_once __DIR__ . '/../models/NewsArticle.php';

abstract class AbstractController
{
    protected $newsModel;
    protected $arParams;

    abstract protected function getTemplatePath();

    abstract protected function show();

    function __construct()
    {
        $this->newsModel = new NewsArticle;
    }

    public function setParams($arParams = [])
    {
        $this->arParams = $arParams;
    }

    protected function render($template, $data)
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        require $this->getTemplatePath() . '/' . $template . '.php';
    }
} 