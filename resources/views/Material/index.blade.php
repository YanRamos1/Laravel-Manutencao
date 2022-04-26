@extends('Layout.body')
@section('title','Equipamentos')


@section('conteudo')
    <h1>Equipamentos</h1>
    <a href="{{route('material.create')}}">Cadastrar Material</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ordem Servico</th>
            <th>Descricao</th>
            <th>Valor</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @if($materiais)
            @foreach($materiais as $material)
                <tr>
                    <td>{{$material->id}}</td>
                    <td>{{$material->nome}}</td>
                    <td>{{$material->ordem_servico_id}}</td>
                    <td>{{$material->descricao['nome']}}</td>
                    <td>{{$material->valor}}</td>
                    <td>{{$material->created_at->format('d/m/Y')}}</td>
                    <td>{{$material->updated_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{route('material.edit',$material->id)}}">Editar</a>
                        <a href="{{route('material.delete',$material->id)}}">Excluir</a>
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
