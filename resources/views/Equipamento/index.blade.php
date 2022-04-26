@extends('Layout.body')
@section('title','Equipamentos')


@section('conteudo')
    <h1>Equipamentos</h1>
    <a href="{{route('equipamento.create')}}">Cadastrar Equipamento</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Serial</th>
            <th>Cliente</th>
            <th>Tipo Equipamento</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @if($equipamentos)
            @foreach($equipamentos as $equipamento)
                <tr>
                    <td>{{$equipamento->id}}</td>
                    <td>{{$equipamento->nome}}</td>
                    <td>{{$equipamento->serial}}</td>
                    <td>{{$equipamento->cliente['primeiro_nome']}}</td>
                    <td>{{$equipamento->tipo_equipamento['nome']}}</td>
                    <td>{{$equipamento->created_at->format('d/m/Y')}}</td>
                    <td>{{$equipamento->updated_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{route('equipamento.edit',$equipamento->id)}}">Editar</a>
                        <a href="{{route('equipamento.delete',$equipamento->id)}}">Excluir</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection


@section('js')
    <script>

    </script>
@endsection
