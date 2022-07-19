<?php

namespace Blog\Models;

use Blog\Database\DatabaseConfig;
use Blog\Database\DatabaseConnection;
use Blog\Database\DatabaseQuery;
use Blog\Repositories\ArrayEntityManager;
use Blog\Repositories\User\UserDataMapper;
use Blog\Repositories\User\UserRepository;

class UserModel
{

    private $databaseConnection;
    private DatabaseQuery $databaseQuery;
    private ArrayEntityManager $persistence;
    private UserRepository $userRepository;

    public function __construct()
    {
        $databaseConfig = new DatabaseConfig('localhost','root','root','3306','Blog');
        $databaseObj = new DatabaseConnection($databaseConfig);
        $this->databaseConnection = $databaseObj->connect();
        $this->databaseQuery = new DatabaseQuery($this->databaseConnection);
    }

    public function getUser(array $request)
    {
        $name = $request['name'];
        $password = $request['password'];
        $queryString = sprintf( 'SELECT id,name,password FROM Blog.USER WHERE name = "%s" AND password = "%s"', $name, $password);
        $userData = $this->databaseQuery->execute($queryString);
        $userDataSource[$userData['id']] = $userData;

        $this->persistence = new ArrayEntityManager($userDataSource);
        $this->userRepository = new UserRepository($this->persistence, new UserDataMapper());
        return $this->userRepository->find($userData['id']);
    }

}