<?php

namespace App\Http\Services\user;

interface UserServiceInterface
{
    public function getUser($id);
    public function updateUser($updateData,$id);

}
