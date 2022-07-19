<?php
declare(strict_types=1);

namespace Blog\Repositories\User;

class UserDataMapper
{
    public static function domainToData(User $user): array
    {
        return  [
            'name' => $user->getName(),
            'password' => $user->getPassword()
        ];
    }

    public static function dataToDomain(array $data) :User
    {
         $user = new User();
         return  $user->setName($data['name'])
            ->setPassword($data['password']);
    }
}