<?php

namespace App\QueryBuilders;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RoleQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Role::query();
    }

    function getCollection(): Collection
    {
        return $this->model->get();
    }
}
