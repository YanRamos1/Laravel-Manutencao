@extends('Layout.body')
@section('title','Clientes')


@section('conteudo')
    <div>
        <h1>Clientes</h1>
        <a href="{{route('cliente.create')}}">Cadastrar Cliente</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->primeiro_nome}}</td>
                    <td>{{$cliente->segundo_nome}}</td>
                    <td>{{$cliente->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{route('cliente.edit',$cliente->id)}}">Editar</a>
                        <a href="{{route('cliente.delete',$cliente->id)}}">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('js')
    <script>
    </script>
@endsection
