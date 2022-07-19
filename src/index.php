<?php

use Blog\Database\DatabaseConfig;
use Blog\Database\DatabaseConnection;

require_once 'Database/DatabaseConfig.php';
require_once 'Database/DatabaseConnection.php';

$databaseConfig = new DatabaseConfig('localhost','root','root','3306','Blog');
$databaseConnection = new DatabaseConnection($databaseConfig);
$databaseConnection->connect();
$databaseConnection->closeConnection();