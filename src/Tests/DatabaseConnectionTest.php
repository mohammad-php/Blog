<?php

namespace Blog\Tests;

use PHPUnit\Framework\TestCase;
use Blog\Database\DatabaseConfig;
use Blog\Database\DatabaseConnection;
use \PDO;

class DatabaseConnectionTest extends TestCase
{

    public function testCanConnectToDatabase(): void
    {
        $databaseConfig = new DataBaseConfig('localhost','root','root','3306','admin');
        $databaseConnection = new DataBaseConnection($databaseConfig);
        $this->assertInstanceOf(PDO::class, $databaseConnection->connect());

    }

}