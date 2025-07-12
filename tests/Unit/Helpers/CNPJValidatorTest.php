<?php

namespace Tests\Unit\Helpers;

use Tests\TestCase;
use App\Helpers\CNPJValidator;

class CNPJValidatorTest extends TestCase
{
    public function test_cnpj_valido()
    {
        $this->assertTrue(CNPJValidator::isValid('11444777000161')); // CNPJ válido real
    }

    public function test_cnpj_invalido()
    {
        $this->assertFalse(CNPJValidator::isValid('11111111111111'));
    }

    public function test_cnpj_com_formatacao()
    {
        $this->assertTrue(CNPJValidator::isValid('11.444.777/0001-61'));
    }
}

