<?php

namespace App\Services;

use App\Models\People;
use App\Models\PersonJuridic;
use App\Helpers\CNPJValidator;
use App\Exceptions\BusinessRuleException;

class PersonJuridicService implements PersonServiceInterface
{
    public function createPerson(string $name, string $document): PersonJuridic
    {
        $document = preg_replace('/[^0-9]/', '', $document);

        if (!CNPJValidator::isValid($document)) {
            throw new BusinessRuleException("CNPJ inválido.");
        }

        if (People::where('document', $document)->where('type', 'JURIDICA')->exists()) {
            throw new BusinessRuleException("CNPJ já cadastrado.");
        }

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
