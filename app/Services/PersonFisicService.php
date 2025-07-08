<?php

namespace App\Services;

use App\Models\PersonFisic;
use App\Models\People;

class PersonFisicService implements PersonServiceInterface
{
    public function createPerson(string $name, string $document): PersonFisic
    {
        $person = new PersonFisic();
        $person->setName($name);
        $person->setDocument($document);

        People::create([
            'name' => $person->getName(),
            'document' => $person->getDocument(),
            'type' => 'FISICA'
        ]);

        return $person;
    }
}
