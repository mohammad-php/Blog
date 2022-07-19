<?php
declare(strict_types=1);

namespace Blog\Controllers;

use Blog\Services\UserService;

/**
 *
 */
class LoginController
{
    /**
     * @var UserService
     */
    protected UserService $userService;

    /**
     *
     */
    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * @return void
     */
    public function index()
    {
        if(!empty($_SESSION['username'])) {
            header("Location: home");
        }
        $content = file_get_contents('Views/Login.php');
        require_once 'Views/Layout/Content.php';
    }

    /**
     * @return void
     */
    public function loginPost()
    {
        if(!empty($_POST['name']) && !empty($_POST['password'])) {
            $user = $this->userService->checkUserCredentials($_POST);
            return header("Location: home");
        }
        header("Location: login");
    }

    /**
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['username']);
        header("Location: login");
    }

}