<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;
use App\Helpers\CPFValidator;

class CPFValidatorTest extends TestCase
{
    public function test_cpf_valido()
    {
        $this->assertTrue(CPFValidator::isValid('12345678909')); // CPF válido real
    }

    public function test_cpf_invalido()
    {
        $this->assertFalse(CPFValidator::isValid('11111111111')); // Dígitos repetidos
    }

    public function test_cpf_com_menos_de_11_digitos()
    {
        $this->assertFalse(CPFValidator::isValid('123'));
    }

    public function test_cpf_com_formatacao()
    {
        $this->assertTrue(CPFValidator::isValid('123.456.789-09'));
    }
}
