<?php


namespace Blog\Database;
use \PDO;
use PDOException;

class DatabaseConnection
{
    /**
     * @var DatabaseConfig
     */
    private $config;

    /**
     * @var PDO
     */
    private $dbConnection;

    public function __construct(DatabaseConfig $config)
    {
        $this->config = $config;
    }

    public function getConnectionString()
    {
        return sprintf('mysql://host:%s;dbname:%s',
            $this->config->getHost(),
            $this->config->getDatabaseName(),
        );
    }

    public function connect()
    {
        try {
            $this->dbConnection = new PDO(
                $this->getConnectionString(),
                $this->config->getUserName(),
                $this->config->getPassword()
            );
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbConnection;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->dbConnection = null;
    }
}