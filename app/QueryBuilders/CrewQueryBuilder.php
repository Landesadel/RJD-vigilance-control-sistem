<?php

namespace App\QueryBuilders;

use App\Models\Crew;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CrewQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Crew::query();
    }

    /**
     * @return Collection
     */
    function getCollection(): Collection
    {
        return $this->model->get();
    }

    /**
     * @param int $id
     * @return Crew
     */
    public function getById(int $id): Crew
    {
        return $this->model->find($id);
    }

    public function getAllUsersByCrewId(int $crewId): Collection
    {
        return User::query()
            ->where('crew_id', $crewId)
            ->get();
    }
}
