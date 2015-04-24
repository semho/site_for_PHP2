<?php

class NewsArticle
    extends Model
{
    protected static $table = 'news';

    public $title;
    public $text;
    public $data_a;
    public $id;
}