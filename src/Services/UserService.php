<?php
declare(strict_types=1);

namespace Blog\Services;

use Blog\Database\DatabaseConfig;
use Blog\Database\DatabaseConnection;
use Blog\Database\DatabaseQuery;
use Blog\Models\UserModel;
use Blog\Repositories\ArrayEntityManager;
use Blog\Repositories\User\UserDataMapper;
use Blog\Repositories\User\UserRepository;

class UserService
{

    protected $databaseConnection;
    protected $databaseQuery;
    private ArrayEntityManager $persistence;
    private UserRepository $userRepository;
    private UserModel $userModel;

    public function __construct()
    {
//        $databaseConfig = new DatabaseConfig('localhost','root','root','3306','Blog');
//        $databaseObj = new DatabaseConnection($databaseConfig);
//        $this->databaseConnection = $databaseObj->connect();
//        $this->databaseQuery = new DatabaseQuery($this->databaseConnection);
        $this->userModel = new UserModel();
    }

    public function checkUserCredentials(array $request)
    {
        $user = $this->userModel->getUser($request);
        if($user !== null) {
            $_SESSION['username'] = $user->getName();
            return $user;
        }
        header("Location: login");
    }

}