<?php

namespace App\Repositories\Profile;

use App\Models\Profile;

class ProfileRepository{

    public function getAll()
    {
        $profiles = Profile::query()
            ->get();

        //Validate if profiles is not empty, to give formate or return empty array
        return count($profiles) > 0 ? $profiles->map->format() : [];
    }

    public function getById($id)
    {
        return Profile::query()
            ->where('id',$id)->firstOrFail();
    }

    public function save($name)
    {
        return Profile::create([
            "name" => $name
            ]
        );
    } 

    public function update($id, $name)
    {
        $profile = Profile::query()->where('id',$id)->firstOrFail();

        $profile->name = $name;

        return $profile->save();
    } 

    public function delete($id)
    {
        return Profile::query()
            ->where('id',$id)->delete();
    } 

}