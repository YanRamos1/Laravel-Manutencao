<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Equipamento;
use App\Models\Material;
use App\Models\Servico;
use App\Models\Cliente;
use App\Models\Cliente_Equipamento;

class OrdemServicoController extends Controller
{
    public function index()
    {
        $ordensServico = OrdemServico::all();
        foreach ($ordensServico as $ordemServico) {
            $ordemServico->equipamento = Equipamento::find($ordemServico->equipamento_id);
        }
        return view('Ordem.index', compact('ordensServico'));
    }

    public function create()
    {
        $equipamentos = Equipamento::all();
        $ordensServico = OrdemServico::all();
        return view('Ordem.create', compact('equipamentos', 'ordensServico'));
    }

    public function show($id){
        $ordemServico = OrdemServico::find($id);
        $ordemServico->equipamento = Equipamento::find($ordemServico->equipamento_id);
        $ordemServico->equipamento->cliente = new Cliente();
        $ordemServico->equipamento->cliente = Cliente_Equipamento::where('equipamento_id', $ordemServico->equipamento->id)->first()->cliente_id;
        $ordemServico->equipamento->cliente = Cliente::find($ordemServico->equipamento->cliente);
        $ordemServico->servico = Servico::where('ordem_servico_id', $ordemServico->id)->get();
        $ordemServico->material = Material::where('ordem_servico_id', $ordemServico->id)->get();
        return view('Ordem.show', [
            'ordemServico' => $ordemServico,
            'servicos' => $ordemServico->servico,
            'materiais' => $ordemServico->material,
        ]);
    }


    public function add(Request $request)
    {
        $ordemServico = new OrdemServico();
        //verifica se o equipamento está em manutenção
        $equipamento = OrdemServico::where('equipamento_id', $request->equipamento)->first();
        if ($equipamento) {
            return 'Equipamento já está em manutenção';
        } else {
            switch ($request->status) {
                case 1:
                    $ordemServico->status = "Fechado";
                    break;
                case 2:
                    $ordemServico->status = "Cancelado";
                    break;
                case 0:
                default:
                    $ordemServico->status = "Aberto";
                    break;
            }
            //remove . e , da data
            $ordemServico->valor_total = str_replace(',', '.', $request->valor);
            $ordemServico->descricao = $request->descricao;
            $ordemServico->equipamento_id = $request->equipamento;
            try {
                $ordemServico->save();
                return 'Ordem de serviço cadastrada com sucesso!';
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }

}
