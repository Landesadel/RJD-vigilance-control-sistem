<?php

namespace App\Models;

use App\QueryBuilders\RoleQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Disturbance extends Model
{
    protected $table = 'dists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'date',
        'time_start',
        'video_time',
        'type',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * todo вышел ужасный костыль, надо потом переделать для оптимизации
     *
     * @param array $params
     * @param mixed $userIds
     * @return void
     */
    public static function createDistsByUserId(array $params, mixed $userIds): void
    {
        foreach ($userIds as $id) {
            $user = User::query()->find($id);

            foreach($params as $paramD) {
                foreach($paramD as $param) {
                    $roleId = (new RoleQueryBuilder())->getRoleIdByName($param['role']);

                    if ($user->role_id == $roleId) {
                        foreach ($param['dist'] as $dist) {
                            self::create([
                                'user_id' => $user->id,
                                'date' => $param['date'],
                                'time_start' => $dist['time_start'],
                                'video_time' => $dist['video_time'],
                                'type' => $dist['type'],
                                'data_create' => now(),
                            ]);
                        }
                    }
                }
            }
        }
    }
}
