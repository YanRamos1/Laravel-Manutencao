<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function index()
    {
        return view('Servico.index');
    }

    public function add(Request $request)
    {

        $servico = new Servico();
        $servico->nome = $request->nome;
        $servico->valor = $request->valor;
        $servico->valor = str_replace(',', '.', $servico->valor);
        $servico->descricao = $request->descricao;
        $servico->ordem_servico_id = $request->ordem;
        try {
            $servico->save();
            return 'Serviço cadastrado com sucesso!';
        } catch (\Exception $e) {
            return e($e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        var_dump($request->id);
    }
}
