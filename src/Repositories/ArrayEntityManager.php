<?php
declare(strict_types=1);

namespace Blog\Repositories;

class ArrayEntityManager implements PersistenceInterface
{
    private array $db;

    public function __construct(array $db)
    {
//        var_dump($db);die;
        $this->db = $db;
    }

    public function persist(array $data)
    {
        $this->db [] = $data;
    }

    public function retrieve(int $id): array
    {
        return  $this->db[$id];
    }

    public function delete(int $id)
    {
        unset($this->db[$id]);
    }
}