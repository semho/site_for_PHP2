<?php

class AutoController
    extends AbstractController
{
    public $path;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../views/auto/';
        parent::__construct();
    }
    public function actionReg()
    {
        if (!empty($_SESSION['user']['login'])) {
            die ("Вы уже зарегистрированны");
        } else {
            $this->view->display('reg');
        }
    }
    public function actionAddUser()
    {
        $login = trim(strip_tags($_POST["login"]));
        $pass = md5($_POST['password']);
        $this->user->login = $login;
        $this->user->password = $pass;
        if($this->user->id = $this->user->insert()) {
            $this->user->saveSession();
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_7/" );
        }
    }
    public function actionAuthentication()
    {
        if (!empty($_SESSION['user']['login'])) {
            die ("Вы уже авторизированны");
        } else {
            $this->view->display('auto');
        }
    }
    public function actionLogout()
    {
        unset ($_SESSION['user']['id']);
        unset ($_SESSION['user']['login']);
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_7/" );
    }
    public function actionInUser()
    {
        $this->user->login = trim(strip_tags($_POST["login"]));
        $this->user->password = md5($_POST['password']);
        $res = $this->user->getLogin($this->user->login, $this->user->password);
        if ($res) {
            $this->user->id = $res->id;
            $this->user->saveSession();
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_7/" );
        } else {
            die ('Неверно введенны логин-пароль.');
        }
    }


} 