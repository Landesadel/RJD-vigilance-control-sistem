<?php

namespace App\Models;

use App\QueryBuilders\RoleQueryBuilder;
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

    /**
     * @param $params
     * @return bool
     */
    public function createWithAssistant($params): bool
    {
        $assistantData = [
            'crew_id' => $params['crew_id'],
            'role_id' => (new RoleQueryBuilder())->getRoleIdByName('Помощник машиниста'),
            'created_at' => now(),
        ];

        foreach ($params as $key => $value) {
            if(str_starts_with($key, 'assistant')) {
                $assistantData [substr($key, 10)] = $value;
                unset($params[$key]);
            }
        }

        $params['created_at'] = now();

        $user = User::create($params);

        if ($user) {
            $assistant = User::create($assistantData);

            if ($assistant) {
                return true;
            }
        }

        return false;
    }

    public function createUser($params): bool
    {
        $params['created_at'] = now();

        $user = User::create($params);

        if ($user) {
            return true;
        }

        return false;
    }
}
