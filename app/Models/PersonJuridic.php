<?php

namespace App\Models;

class PersonJuridic extends Person
{
    protected function validateDocument(string $document): void
    {
        // Simples validação de CNPJ como placeholder
        if (strlen($document) !== 14) {
            throw new \Exception("CNPJ inválido.");
        }
    }
}
