<?php
declare(strict_types=1);

namespace Blog\Repositories;

abstract class EntityRepository
{
    private string $entityClassName;

    public function __construct(string $entityClassName = null)
    {
        $this->entityClassName = $entityClassName;
    }
}