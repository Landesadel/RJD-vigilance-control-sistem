<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'crew_id',
        'last_name',
        'name',
        'second_name',
        'role_id',
    ];

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * @return BelongsTo
     */
    public function crew(): BelongsTo
    {
        return $this->belongsTo(Crew::class, 'crew_id');
    }

    /**
     * @param int $crewId
     * @return Crew
     */
    public function getCrew(int $crewId): Crew
    {
        $user = User::with('crew')
            ->where('crew_id', $crewId)
            ->first();

        return $user->crew;
    }
}
