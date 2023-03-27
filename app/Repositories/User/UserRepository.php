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

    public function getAll()
    {
        $users = User::query()
            ->with("employee")
            ->with("profile")
            ->get();

        //Validate if users is not empty, to give formate or return empty array
        return count($users) > 0 ? $users->map->format() : [];
    }
}