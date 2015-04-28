<?php

namespace App\Models;

class News
    extends \Model
{
    protected static $table = 'news';

    public $title;
    public $text;
    public $data_a;
    public $id;
}