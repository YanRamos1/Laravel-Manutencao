@extends('Layout.body')
@section('title','Equipamentos')


@section('conteudo')
    formulario de cadastro de equipamentos
    <form id="formNovoEquipamento">
        @csrf
        <legend>Novo Equipamento</legend>
        <div class="form-group row m-2">
            <label for="staticNome" class="col-sm-2 col-form-label">Modelo Equipamento</label>
            <div class="col-sm-10">
                <input type="text" name="nome" class="form-control-plaintext border" id="staticNome"
                       placeholder="Modelo do Equipamento">
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="staticSerial" class="col-sm-2 col-form-label">Serial</label>
            <div class="col-sm-10">
                <input type="text" name="Serial" class="form-control-plaintext border" id="staticSerial"
                       placeholder="Serial">
            </div>
        </div>
        <div class="form-group d-flex justify-content-between align-items-center">
            <label for="TipoEquipamentoSelect" class="form-label mt-4 align-self-center">Tipo de Equipamento</label>
            <select class="form-select border m-2" name="TipoEquipamentoSelect" id="TipoEquipamentoSelect">
                @foreach($tipo_equipamento as $tipoEquipamento)
                    <option value="{{$tipoEquipamento->id}}">{{$tipoEquipamento->nome}}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTipoEquipamento">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="form-group d-flex justify-content-between align-items-center">
            <label for="ClienteSelect" class="form-label mt-4 align-self-center">Cliente</label>
            <select class="form-select border m-2" name="ClienteSelect" id="ClienteSelect">
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->primeiro_nome}} {{$cliente->segundo_nome}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="modal fade" id="modalTipoEquipamento" tabindex="-1" role="dialog" aria-labelledby="modalTipoEquipamento"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddTipo">Novo Tipo de Equipamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formNovoTipo">
                        @csrf
                        <div class="form-group">
                            <label for="nomeType" class="form-label">Nome</label>
                            <input type="text" name="nomeType" class="form-control border" id="nomeType"
                                   placeholder="Nome do Tipo de Equipamento">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>

    </script>
@endsection
