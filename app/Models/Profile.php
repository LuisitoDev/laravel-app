<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Profile
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Profile extends Model
{
    use HasFactory;

	protected $guarded = [];  

    public function users() : HasMany
	{
		return $this->hasMany(User::class, "profile_id", "id");
	}
}
