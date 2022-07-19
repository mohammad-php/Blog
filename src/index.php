<?php

// For Testing

use Blog\Database\DatabaseConfig;
use Blog\Database\DatabaseConnection;
use Blog\Database\DatabaseQuery;
use Blog\Repositories\ArrayEntityManager;
use Blog\Repositories\User\UserDataMapper;
use Blog\Repositories\User\UserRepository;

require_once 'Database/DatabaseConfig.php';
require_once 'Database/DatabaseConnection.php';

require_once 'Repositories/User/User.php';
require_once 'Repositories/PersistenceInterface.php';
require_once 'Repositories/EntityRepository.php';
require_once 'Repositories/ArrayEntityManager.php';
require_once 'Repositories/User/UserRepositoryInterface.php';
require_once 'Repositories/User/UserRepository.php';
require_once 'Repositories/User/UserDataMapper.php';
require_once 'Database/DatabaseQuery.php';

$databaseConfig = new DatabaseConfig('localhost','root','root','3306','Blog');
$databaseObj = new DatabaseConnection($databaseConfig);
$databaseConnection = $databaseObj->connect();
//$databaseConnection->closeConnection();

## User

$queryString = 'SELECT id,name,password FROM Blog.USER WHERE name = "Mohammad" AND password = "123456"';
$databaseQuery = new DatabaseQuery($databaseConnection);
$user = $databaseQuery->execute($queryString);
$userDataSource[$user['id']] = $user;

$persistence = new ArrayEntityManager($userDataSource);
$userRepository = new UserRepository($persistence, new UserDataMapper());
$user = $userRepository->find(1);
var_dump($user);die;