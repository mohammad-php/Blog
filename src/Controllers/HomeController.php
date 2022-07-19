<?php
declare(strict_types=1);

namespace Blog\Controllers;

/**
 *
 */
class HomeController
{

    /**
     * @return void
     */
    public function index(): void
    {
        require_once 'Views/Layout/Content.php';
        if (!empty($_SESSION['username'])) {
            printf('Welcome %s', $_SESSION['username']);
        } else {
            header("Location: login");
        }
    }

}