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

    /**
     * @param string $name
     * @return int
     */
    public function getRoleIdByName(string $name): int
    {
        $roleId = $this->model->where('name', $name)->pluck('id')->first();

        if (!$roleId) {
            $role = Role::create([
                'name' => $name,
                'created_at' => now(),
            ]);

            $roleId = $role->id;
        }

        return $roleId;
    }
}
