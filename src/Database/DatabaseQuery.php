<?php
declare(strict_types=1);

namespace Blog\Database;

use \PDO;

class DatabaseQuery
{

    /**
     * @var PDO
     */
    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function execute($sqlString)
    {
        $query = $this->dbConnection->query($sqlString, PDO::FETCH_ASSOC);
        if (empty($query)) {
            return $this->dbConnection->errorInfo();
        }
        return $query->fetch();
    }

}