<?php
class DataBase
{
    public function __construct()
    {
        $config = include __DIR__ . '/../config/db.php';
        $db = mysql_connect($config['host'], $config['user'], $config['password']);
        if (!$db) {
            echo "������ ����������� � ��";
        } else {
            mysql_selectdb($config['dbname']);
        }
    }
    //���������� ������ �������
    public function dbFindAllByQuery($sql)
    {
        $result = mysql_query($sql);
        if (!$result) {
            die(mysql_error());
        } else {
            $arAllItems = [];
            while ($array = mysql_fetch_array($result)) {
                $arAllItems[] = $array;
            }
            return $arAllItems;
        }
    }
    //����������� ���� ������
    public function dbFindOneByQuery($sql)
    {
        return $this->dbFindAllByQuery($sql)[0];
    }
    //�������� ����, ��� ������ ���������� ��������� � ������� �� ��
    public function dbCheckErrorByQuery($sql)
    {
        $result = mysql_query($sql);
        if (!$result) {
            die(mysql_error());
        } else {
            return $result;
        }
    }
}