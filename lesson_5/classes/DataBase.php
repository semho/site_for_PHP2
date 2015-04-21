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
    public function dbFindAllByQuery($class, $sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $res = $sth->fetchAll(PDO::FETCH_CLASS, $class);
        return $res;
    }
    //ввозвращает одну запись
    public function dbFindOneByQuery($class, $sql, $params = [])
    {
        return $this->dbFindAllByQuery($class, $sql, $params)[0];
    }
    public function dbCheckErrorByQuery($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (!$res) {
            die(mysql_error());
        } else {
            return $res;
        }
    }
}