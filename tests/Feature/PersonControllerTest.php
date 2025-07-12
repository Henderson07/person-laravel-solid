<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\PersonFisic;

class PersonControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_criar_pessoa_fisica_com_cpf_valido()
    {
        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest'
        ])->postJson('/person/create', [
                    'type' => 'FISICA',
                    'name' => 'Lucas',
                    'document' => '12034655990',
                ]);


        $response->assertStatus(201);
        $this->assertDatabaseHas('people', [
            'name' => 'Lucas',
            'document' => '12034655990',
        ]);
    }

    public function test_deve_retornar_erro_para_cpf_invalido()
    {
        $response = $this->postJson('/api/person/create', [
            'type' => 'FISICA',
            'name' => 'Lucas',
            'document' => '11111111111',
        ]);

        $response->assertStatus(422); // Ou 400, dependendo do seu controller
        $response->assertJsonFragment([
            'message' => 'CPF inválido'
        ]);
    }
}

