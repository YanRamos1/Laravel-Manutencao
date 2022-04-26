<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('Cliente.index', compact('clientes'));
    }


    public function create()
    {
        return view('Cliente.create');
    }

    public function add(Request $request){
       $cliente = new Cliente();
       $cliente->primeiro_nome = $request->PrimeiroNome;
       $cliente->segundo_nome = $request->Sobrenome;
       $cliente->genero = $request->Genero;
       $cliente->save();
    }



}
