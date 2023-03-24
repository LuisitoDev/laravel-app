<?php

declare( strict_types = 1 );

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $profile_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Profile $profile
 * @property Employee $employees
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory;

    public function profile() : BelongsTo
	{
		return $this->belongsTo(Profile::class, "profile_id", "id");
	}

    public function employee() : HasOne
	{
        return $this->hasOne(Employee::class, "user_id", "id");
	}
}
