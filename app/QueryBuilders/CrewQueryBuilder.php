<?php

namespace App\QueryBuilders;

use App\Models\Crew;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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

    /**
     * @param int $crewId
     * @return Collection
     */
    public function getAllUsersByCrewId(int $crewId): Collection
    {
        return User::query()
            ->where('crew_id', $crewId)
            ->get();
    }

    /**
     * @param int $crewId
     * @return array
     */
    public function getCountDistsByCrewId(int $crewId): array
    {
        $resultData = [];

        $resultData['phone_count'] = DB::table('crews')
           ->join('users', 'crews.id', '=', 'users.crew_id')
           ->join('dists', 'users.id', '=', 'dists.user_id')
           ->where('crews.id', $crewId)
           ->where('dists.type', 'phone')
           ->count();

        $resultData['distracted'] = DB::table('crews')
            ->join('users', 'crews.id', '=', 'users.crew_id')
            ->join('dists', 'users.id', '=', 'dists.user_id')
            ->where('crews.id', $crewId)
            ->where('dists.type', 'distracted')
            ->count();

        $resultData['empty_place'] = DB::table('crews')
            ->join('users', 'crews.id', '=', 'users.crew_id')
            ->join('dists', 'users.id', '=', 'dists.user_id')
            ->where('crews.id', $crewId)
            ->where('dists.type', 'empty_place')
            ->count();

       return $resultData;
    }
}
