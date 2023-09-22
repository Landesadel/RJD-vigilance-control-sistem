<?php

namespace App\QueryBuilders;

use App\Models\Crew;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CrewQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Crew::query();
    }

    function getCollection(): Collection
    {
        return $this->model->get();
    }
}
