<?php
function allNews()
{
    $db = new DateBase;
    $sql = 'SELECT * FROM news ORDER BY data_a DESC';
    $ret = $db->dbFindAllByQuery($sql);
    return $ret;
}

function selectOneById($id)
{
    $db = new DateBase;
    $sql = 'SELECT * FROM news WHERE id=' . $id;
    $ret = $db->dbFindOneByQuery($sql);
    return $ret;
}