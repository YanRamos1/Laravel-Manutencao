<?php

namespace App\Http\Controllers;
use App\Models\Equipamento;
use App\Models\Cliente;
use App\Models\Tipo_Equipamento;
use App\Models\Cliente_Equipamento;

use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function index()
    {
        //get Equipamento with Tipo_Equipamento
        $equipamentos = Equipamento::all();
        foreach ($equipamentos as $equipamento) {
            $equipamento->tipo_equipamento = Tipo_Equipamento::find($equipamento->tipo_equipamento_id);
            $equipamento->cliente = Cliente_Equipamento::where('equipamento_id', $equipamento->id)->first();
            $equipamento->cliente = Cliente::find($equipamento->cliente->cliente_id);
        }
        return view('equipamento.index', compact('equipamentos'));
    }

    public function create()
    {
        $tipo_equipamento = Tipo_Equipamento::all();
        $clientes = Cliente::all();
        return view('equipamento.create', compact('tipo_equipamento', 'clientes'));
    }

    public function add(Request $request){
        $equipamento = new Equipamento();
        $cliente = new Cliente();
        $cliente_equipamento = new Cliente_Equipamento();

        //verifica se o cliente existe
        $cliente = $cliente->find($request->cliente_id);
        if(!$cliente){
            return redirect()->back()->with('error', 'Cliente não encontrado');
        }
        if($request->tipoEquipamentoSelect == null){
            return 'Selecione um tipo de equipamento';
        }
        $equipamento = $equipamento->where('serial', $request->serialEquipamento)->first();
        if($equipamento){
            return 'Equipamento já cadastrado';
        }else{
            $equipamento = new Equipamento();
            $equipamento->nome = $request->nomeEquipamento;
            $equipamento->serial = $request->serialEquipamento;
            $equipamento->tipo_equipamento_id = $request->tipoEquipamentoSelect;
            $equipamento->save();
            $Cliente_Equipamento = new Cliente_Equipamento();
            $Cliente_Equipamento->cliente_id = $request->cliente_id;
            $Cliente_Equipamento->equipamento_id = $equipamento->id;
            $Cliente_Equipamento->save();
            return 'Equipamento cadastrado com sucesso';
        }

    }

    public function addNewType(Request $request){
        $tipo_equipamento = new Tipo_Equipamento();
        if($tipo_equipamento->ValidadeName($request->nomeType)){
            return 'Nome já existe';
        }else{
            $tipo_equipamento->nome = $request->nomeType;
            $tipo_equipamento->save();
            return 'Tipo de equipamento adicionado com sucesso';
        }
    }

}
