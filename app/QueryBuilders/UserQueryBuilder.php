<?php

namespace App\QueryBuilders;

use App\Models\User;
use App\Models\Crew;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    function getCollection(): Collection
    {
        return $this->model->get();
    }

    /**
     * @param int $crewId
     * @return Builder
     */
    public function getCollectionByCrewId(int $crewId): Collection
    {
        return $this->model->where('crew_id', $crewId)->get();
    }

    /**
     * @param int $id
     * @return User
     */
    public function getById(int $id): User
    {
        return $this->model->find($id);
    }
}
