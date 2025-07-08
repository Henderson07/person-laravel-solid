<?php

namespace App\Models;

class PersonFisic extends Person
{
    protected function validateDocument(string $document): void
    {
        // Simples validação de CPF como placeholder
        if (strlen($document) !== 11) {
            throw new \Exception("CPF inválido.");
        }
    }
}
