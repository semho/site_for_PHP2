<?php
class DataBase
{
    protected $dbh;

    public function __construct()
    {
        $config = include __DIR__ . '/../config/db.php';
        $dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'];
        $this->dbh = new PDO($dsn, $config['user'], $config['password']);
    }
    //возвращает массив записей
    public function findAll($class, $sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $res = $sth->fetchAll(PDO::FETCH_CLASS, $class);
        return $res;
    }
    //ввозвращает одну запись
    public function findOne($class, $sql, $params = [])
    {
        return $this->findAll($class, $sql, $params)[0];
    }
    //Подготавливает запрос к выполнению
    public function getQuery($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return true;
    }
    //Подготавливает запрос к выполнению и возвращает последнее id
    public function getQueryId($sql, $params = [])
    {
        $this->getQuery($sql, $params);
        return $this->dbh->lastInsertId();
    }

    /*
    // получаем только одно поле
    public function getColumn($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $res = $sth->fetchColumn();
        return $res;
    }*/
}