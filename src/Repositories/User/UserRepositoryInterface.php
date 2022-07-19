<?php
declare(strict_types=1);

namespace Blog\Repositories\User;

interface UserRepositoryInterface
{
    public function find(int $id) :User;
    public function save(User $user) :bool;
    public function remove(int $user) :bool;
}