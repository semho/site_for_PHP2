<?php

class AutoController
    extends AbstractController
{
    public $path;
    public $user;
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
        $user = new Users();
        $login = trim(strip_tags($_POST["login"]));
        $pass = md5($_POST['password']);
        $user->login = $login;
        $user->password = $pass;
        $res = $user->insert();
        if ($res) {
            $_SESSION['user']['login'] = $login;
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_6/" );
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
    public function actionInUser()
    {
        $login = trim(strip_tags($_POST["login"]));
        $password = md5($_POST['password']);
        $res = Users::selectUser($login, $password);
        if ($res) {
            $_SESSION['user']['login'] = $res->login;
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_6/" );
        } else {
            echo "Не совпадает пара: логин-пароль";
        }
    }
} 