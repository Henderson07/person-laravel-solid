<?php

namespace App\Services;

use App\Models\PersonJuridic;
use App\Models\People;

class PersonJuridicService implements PersonServiceInterface
{
    public function createPerson(string $name, string $document): PersonJuridic
    {
        $person = new PersonJuridic();
        $person->setName($name);
        $person->setDocument($document);

        People::create([
            'name' => $person->getName(),
            'document' => $person->getDocument(),
            'type' => 'JURIDICA'
        ]);

        return $person;
    }
}
