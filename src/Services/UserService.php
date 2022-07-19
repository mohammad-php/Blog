<?php
declare(strict_types=1);

namespace Blog\Services;

use Blog\Models\UserModel;
use Blog\Repositories\ArrayEntityManager;
use Blog\Repositories\User\UserRepository;

class UserService
{

    private ArrayEntityManager $persistence;
    private UserRepository $userRepository;
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function checkUserCredentials(array $request)
    {
        $user = $this->userModel->getUser($request);
        if($user) {
            $_SESSION['username'] = $user->getName();
            return $user;
        }
        header("Location: login");
    }

}