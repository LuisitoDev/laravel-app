<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Employee
 * 
 * @property int $id
 * @property int $user_id
 * @property Carbon $birthday
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class Employee extends Model
{
    use HasFactory;

    public function user() : BelongsTo
	{
        return $this->belongsTo(User::class, "user_id", "id");
	}
}
