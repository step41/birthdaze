<?php

namespace App\Transformers;

use App\Models\Person;
use League\Fractal\TransformerAbstract;

class PersonTransformer extends TransformerAbstract
{
    public function transform(Person $person)
    {
        $formattedPerson = [
            'name'          => $person->name,
            'birthdate'     => $person->birthdate,
            'timezone'      => $person->timezone,
            'createdAt'     => (string) $person->created_at,
            'updatedAt'     => (string) $person->updated_at
        ];

        return $formattedPerson;
    }
}
