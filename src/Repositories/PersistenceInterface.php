<?php
declare(strict_types=1);

namespace Blog\Repositories;

interface PersistenceInterface
{
    public function persist(array $data);

    public function retrieve(int $id): array;

    public function delete(int $id);
}