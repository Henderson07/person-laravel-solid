<?php

namespace App\Services;

use App\Models\People;
use App\Models\PersonFisic;
use App\Helpers\CPFValidator;
use App\Exceptions\BusinessRuleException;

class PersonFisicService implements PersonServiceInterface
{
    public function createPerson(string $name, string $document): PersonFisic
    {

        $document = preg_replace('/[^0-9]/', '', $document);

        if (!CPFValidator::isValid($document)) {
            throw new BusinessRuleException("CPF inválido.");
        }

        if (People::where('document', $document)->where('type', 'FISICA')->exists()) {
            throw new BusinessRuleException("CPF já cadastrado.");
        }

        $person = new PersonFisic();
        $person->setName($name);
        $person->setDocument($document);

        // Persistência separada do domínio
        People::create([
            'name' => $person->getName(),
            'document' => $person->getDocument(),
            'type' => 'FISICA',
        ]);
        return $person;
    }
}
