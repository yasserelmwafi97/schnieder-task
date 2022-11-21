<?php

namespace App\Http\Services\user;


use App\Http\Repositories\user\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

    private UserRepositoryInterface $UserRepository;

    public function __construct(UserRepositoryInterface  $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function getUser($id)
    {
     return $this->UserRepository->find($id);
    }

    public function updateUser( $updateData,$id)
    {
        return $this->UserRepository->update($updateData,$id);
    }
}
