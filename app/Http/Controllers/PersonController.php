<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Services\PersonFisicService;
use App\Services\PersonJuridicService;
use App\Services\PersonServiceResolver;
use App\Exceptions\BusinessRuleException;

class PersonController extends Controller
{
    private $fisicService;
    private $juridicService;
    private $serviceResolver;

    public function __construct(PersonFisicService $fisicService, PersonJuridicService $juridicService, PersonServiceResolver $serviceResolver)
    {
        $this->fisicService = $fisicService;
        $this->juridicService = $juridicService;
        $this->serviceResolver = $serviceResolver;
    }

    public function create(Request $request)
    {
        $type = $request->input('type');
        $service = $this->serviceResolver->resolve($type); // Resolver para obter o serviço correto

        try {
            // Cria a pessoa e retorna a resposta
            $person = $service->createPerson($request->input('name'), $request->input('document'));

            // Redireciona ou exibe mensagem de sucesso
            return redirect()->route('person.create')->with('success', 'Pessoa criada com sucesso!');
        } catch (BusinessRuleException $e) {
            return back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return back()->with('error', 'Erro técnico: ' . $e->getMessage());
        }
    }
}

