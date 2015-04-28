<?php
namespace App\Controllers;
use App\Classes\View;
use App\Models\User;

abstract class AbstractController {

    protected $view;

    public function __construct(){
        $this->view = new View($this->path);
        $this->user = new User();
    }
} 