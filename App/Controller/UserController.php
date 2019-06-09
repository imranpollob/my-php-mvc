<?php

require_once './Core/View.php';
require_once './Core/BaseController.php';
require_once './App/Model/User.php';

class UserController extends BaseController
{
    public function index()
    {
        View::render('users', ['users' => User::all()]);
    }
}