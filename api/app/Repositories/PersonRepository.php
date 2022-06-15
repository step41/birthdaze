<?php

namespace App\Repositories;

use App\Models\Person;
use Illuminate\Support\Facades\Hash;
use App\Events\PersonEvents\PersonCreatedEvent;
use App\Repositories\Contracts\PersonRepository as PersonRepositoryContract;

class PersonRepository extends AbstractRepository implements PersonRepositoryContract
{
    /**
     * @inheritdoc
     */
    public function __construct(Person $model)
    {
        $this->model = $model;
    }

}
