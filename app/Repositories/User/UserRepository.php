<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository{

    public function save($name, $email, $password, $profile, $birthday)
    {
        $userCreated = User::create([
            "name" => $name, 
            "email" => $email, 
            "password" => Hash::make($password),
            "profile_id" => $profile
            ]
        );

        return $userCreated->employee()->create([
            "birthday" => $birthday
        ]);
    } 

    public function update($id, $name, $password, $profile, $birthday)
    {

        $user = User::query()->where('id',$id)->firstOrFail();

        $user->name = $name;
        $user->profile_id = $profile;
        $user->employee->birthday = $birthday;

        return $user->save() && $user->employee->save();
    } 

    public function getById($id)
    {
        return User::query()
            ->where('id',$id)->firstOrFail();
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

    public function delete($id)
    {
        return User::query()
            ->where('id',$id)->delete();
    } 
}