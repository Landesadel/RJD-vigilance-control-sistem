<?php

namespace App\QueryBuilders;

use App\Models\Disturbance;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class DisturbanceQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Disturbance::query();
    }

    function getCollection(): Collection
    {
        return $this->model->get();
    }
}
