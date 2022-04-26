@extends('Layout.body')
@section('title','Equipamentos')


@section('conteudo')
    <h1>Ordens de Serviço</h1>
    <a href="{{route('ordem.create')}}">Cadastrar Ordem de Servico</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Equipamento Nome</th>
            <th>Descricao</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @if($ordensServico->count() > 0)
            @foreach($ordensServico as $ordemServico)
                <tr>
                    <td>
                        <a href="{{route('ordem.show',$ordemServico->id)}}">
                            {{$ordemServico->id}}
                        </a>
                    </td>
                    <td>{{$ordemServico->equipamento['nome']}}</td>
                    <td>{{$ordemServico->descricao}}</td>
                    <td>{{$ordemServico->created_at->format('d/m/Y')}}</td>
                    <td>{{$ordemServico->updated_at->format('d/m/Y')}}</td>
                    <td>{{$ordemServico->status}}</td>
                    <td>
                        <a href="{{route('ordem.edit',$ordemServico->id)}}">Editar</a>
                        <a href="{{route('ordem.delete',$ordemServico->id)}}">Excluir</a>
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
