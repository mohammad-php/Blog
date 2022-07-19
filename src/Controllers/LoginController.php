<?php
declare(strict_types=1);

namespace Blog\Controllers;

use Blog\Services\UserService;

class LoginController
{
    protected UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        if(!empty($_SESSION['username'])) {
            header("Location: home");
        }
        $content = file_get_contents('Views/Login.php');
        require_once 'Views/Layout/Content.php';
    }

    public function loginPost()
    {
        if(!empty($_POST['name']) && !empty($_POST['password'])) {
            $user = $this->userService->checkUserCredentials($_POST);
            return header("Location: home");
        }
        header("Location: login");
    }

    public function logout()
    {
        unset($_SESSION['username']);
        header("Location: login");
    }

}