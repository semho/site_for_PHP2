<?php
require __DIR__ . '/../db/db.php';

function allNews()
{
    $sql = 'SELECT * FROM news ORDER BY data_a DESC';
    $ret = dbFindAllByQuery($sql);
    return $ret;
}

function selectOneById($id)
{
    $sql = 'SELECT * FROM news WHERE id=' . $id;
    $ret = dbFindOneByQuery($sql);
    return $ret;
}