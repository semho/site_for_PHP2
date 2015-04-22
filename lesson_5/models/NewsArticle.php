<?php

require __DIR__ . '/../classes/Model.php';

class NewsArticle
    extends Model
{
    protected static $table = 'news';
    public $id;
    public $title;
    public $text;

    public $inFields;
    public $endFields;
    public $arParams = [];

    public function insert()
    {
        $this->inFields = "(title, text, data_a)"; //поля записи таблицы БД куда будут помещены новые данные
        $this->endFields = "(:title, :text, NOW())"; //новые данные
        $this->arParams = [':title' => $this->title, ':text' => $this->text];//преобразование
        return parent::insert();
    }
    public function update()
    {
        $this->inFields = "title =:title, text =:text"; //замещение полей записи таблицы БД новыми данными
        $this->endFields = "id=:id"; //условие совпадения по id
        $this->arParams = [':id' => $this->id, ':title' => $this->title, ':text' => $this->text];
        return parent::update();
    }
    public function delete()
    {
        $this->endFields = "id=:id";
        $this->arParams = [':id' => $this->id];
        return parent::delete();
    }
}