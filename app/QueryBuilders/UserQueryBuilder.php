<?php

namespace App\QueryBuilders;

use App\Models\User;
use App\Models\Crew;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    /**
     * @return Collection
     */
    function getCollection(): Collection
    {
        return $this->model->get();
    }

    /**
     * @param int $crewId
     * @return Collection
     */
    public function getCollectionByCrewId(int $crewId): Collection
    {
        return $this->model->where('crew_id', $crewId)->get();
    }

    /**
     * @param int $userId
     * @return User
     */
    public function getById(int $userId): User
    {
        return $this->model->find($userId);
    }

    /**
     * @param int $userId
     * @param int $quantity
     * @return Paginator
     */
    public function getUserDistsByUserId(int $userId, int $quantity = 50): Paginator
    {
        return DB::table('dists')
            ->where('user_id', $userId)
            ->simplePaginate($quantity);
    }
}
