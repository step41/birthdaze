<?php

namespace App\Repositories\Decorators;

use App\Repositories\Contracts\PersonRepository as PersonRepositoryContract;

class CachedPersonRepository extends CachedRepository implements PersonRepositoryContract
{
    /**
     * The type of the resource
     *
     * @var string
     */
    protected $resourceType = 'persons';
}
