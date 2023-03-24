<?php

namespace App\Repositories\Profile;

use App\Models\Profile;

class ProfileRepository{

    public function getAll()
    {
        return Profile::query()->get();
    }
}