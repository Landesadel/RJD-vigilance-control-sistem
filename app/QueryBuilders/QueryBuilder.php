<?php


namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;

abstract class QueryBuilder
{
    abstract function getCollection(): Collection;
}
