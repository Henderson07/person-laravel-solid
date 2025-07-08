<?php

namespace App\Services;

use InvalidArgumentException;

class PersonServiceResolver
{
    private PersonFisicService $fisicService;
    private PersonJuridicService $juridicService;

    public function __construct(PersonFisicService $fisicService, PersonJuridicService $juridicService)
    {
        $this->fisicService = $fisicService;
        $this->juridicService = $juridicService;
    }

    public function resolve(string $type): PersonServiceInterface
    {
        return match (strtoupper($type)) {
            'FISICA' => $this->fisicService,
            'JURIDICA' => $this->juridicService,
            default => throw new InvalidArgumentException("Tipo de pessoa inválido: {$type}")
        };
    }
}
