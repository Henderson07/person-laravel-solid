<?php

namespace App\Models;

use App\Exceptions\PersonNameInvalidQuantityCharacters;

abstract class Person
{
    protected string $name;
    protected string $document;

    public function setName(string $name): void
    {
        if (strlen($name) > 100) {
            throw new PersonNameInvalidQuantityCharacters("O nome da pessoa pode ter no máximo 100 caracteres.");
        }
        $this->name = $name;
    }

    public function setDocument(string $document): void
    {
        $this->validateDocument($document);
        $this->document = $document;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDocument(): string
    {
        return $this->document;
    }

    abstract protected function validateDocument(string $document): void;
}
