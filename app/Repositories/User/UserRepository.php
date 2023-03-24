<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository{

    public function save($name, $email, $password, $profile, $birthday)
    {
        $userCreated = User::create([
            "name" => $name, 
            "email" => $email, 
            "password" => $password,
            "profile_id" => $profile
            ]
        );

        return $userCreated->employee()->create([
            "birthday" => $birthday
        ]);
    } 
}