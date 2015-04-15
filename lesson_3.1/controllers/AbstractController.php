<?php

require_once __DIR__ . '/../models/NewsArticle.php';

abstract class AbstractController
{
    protected $arParams;

    abstract protected function getTemplatePath();

    protected function render($template, $data)
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        require $this->getTemplatePath() . '/' . $template . '.php';
    }

} 