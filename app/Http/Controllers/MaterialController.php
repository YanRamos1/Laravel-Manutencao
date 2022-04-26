<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $materiais = Material::all();
        return view('Material.index',compact('materiais'));
    }
    public function create()
    {
        return view('Material.create');
    }
    public function add(Request $request){
        $material = new Material();
        $material->nome = $request->nome;
        $material->valor = $request->valor;
        $material->valor = str_replace(',','',$material->valor);

        $material->descricao = $request->descricao;
        $material->ordem_servico_id = $request->ordem;

        try{
            $material->save();
            return 'Material cadastrado com sucesso!';
        }
        catch(\Exception $e){
            return 'Erro ao cadastrar material!';
        }
    }

    public function delete(Request $request){
        $material = Material::find($request->id);
        var_dump($material);
    }
}
