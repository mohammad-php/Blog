<?php

namespace Tests;

use Blog\Database\DatabaseConfig;
use Blog\Database\DatabaseConnection;
use Blog\Database\DatabaseQuery;
use Blog\Repositories\ArrayEntityManager;
use Blog\Repositories\PersistenceInterface;
use Blog\Repositories\User\User;
use Blog\Repositories\User\UserDataMapper;
use Blog\Repositories\User\UserRepository;
use Blog\Repositories\User\UserRepositoryInterface;
use \PDO;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private PersistenceInterface $persistence;
    private UserRepositoryInterface $userRepository;
    private DatabaseConfig $databaseConfig;
    private \PDO $databaseConnection;
    private DatabaseQuery $databaseQuery;

    protected function setUp(): void
    {
        // Init Database Connection
        $this->databaseConfig = new DatabaseConfig('localhost','root','root','3306','Blog');
        $databaseObj = new DatabaseConnection($this->databaseConfig);
        $this->databaseConnection = $databaseObj->connect();

        // Get User Data Source
        $this->databaseQuery = new DatabaseQuery($this->databaseConnection);
        $queryString = 'SELECT id,name,password FROM Blog.USER WHERE name = "Mohammad" AND password = "123456"';
        $user = $this->databaseQuery->execute($queryString);
        $userDataSource[$user['id']] = $user;

        $this->persistence = new ArrayEntityManager($userDataSource);
        $this->userRepository = new UserRepository($this->persistence, new UserDataMapper());
    }

    public function testCanFindUserById()
    {
        $user = $this->userRepository->find(1);
        self::assertInstanceOf(User::class, $user);
        self::assertEquals('Mohammad', $user->getName());
    }


}