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
        $user = new User();
        $login = trim(strip_tags($_POST["login"]));
        $pass = md5($_POST['password']);
        $user->login = $login;
        $user->password = $pass;
        if($user->id = $user->insert()) {
            $user->saveSession();
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
    public function actionLogout()
    {
        unset ($_SESSION['user']['id']);
        unset ($_SESSION['user']['login']);
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_6/" );
    }
    public function actionInUser()
    {
        $user = new User();
        $user->login = trim(strip_tags($_POST["login"]));
        $user->password = md5($_POST['password']);
        $res = $user->getLogin($user->login, $user->password);
        if ($res) {
            $user->id = $res->id;
            $user->saveSession();
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_6/" );
        } else {
            die ('Неверно введенны логин-пароль.');
        }
    }


} 