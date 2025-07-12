<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\PersonFisicService;
use App\Exceptions\BusinessRuleException;
use App\Models\People;

class PersonFisicServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_criar_pessoa_fisica_com_cpf_valido()
    {
        $service = new PersonFisicService();

        $cpf = '12345678909'; // CPF válido real
        $name = 'João Silva';

        $pessoa = $service->createPerson($name, $cpf);

        // Testa se o objeto retornado tem os dados corretos
        $this->assertEquals($name, $pessoa->getName());
        $this->assertEquals($cpf, $pessoa->getDocument());

        // Testa se foi persistido corretamente na tabela `people`
        $this->assertDatabaseHas('people', [
            'name' => $name,
            'document' => $cpf,
            'type' => 'FISICA',
        ]);
    }

    public function test_nao_deve_criar_pessoa_fisica_com_cpf_invalido()
    {
        $this->expectException(BusinessRuleException::class);
        $this->expectExceptionMessage('CPF inválido');

        $service = new PersonFisicService();
        $service->createPerson('Maria', '11111111111');
    }

    public function test_nao_deve_criar_pessoa_fisica_com_cpf_repetido()
    {
        People::create([
            'name' => 'Pessoa Existente',
            'document' => '12034655990',
            'type' => 'FISICA',
        ]);

        $this->expectException(BusinessRuleException::class);
        $this->expectExceptionMessage('CPF já cadastrado');

        $service = new PersonFisicService();
        $service->createPerson('Nova Pessoa', '12034655990');
    }
}


