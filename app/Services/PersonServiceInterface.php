<?php

namespace App\Services;

use App\Models\Person;

interface PersonServiceInterface
{
    public function createPerson(string $name, string $document): Person;
}
