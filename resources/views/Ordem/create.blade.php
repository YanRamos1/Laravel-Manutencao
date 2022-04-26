@extends('Layout.body')
@section('title','Equipamentos')


@section('conteudo')
    <form id="formNovaOrdem">
        @csrf
        <legend>Nova Ordem</legend>
        <div class="form-group row m-2">
            <label for="inputValor" class="col-sm-2 col-form-label">Valor Inicial</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext border" id="inputValor"
                       placeholder="Valor Inicial">
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="staticStatus" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select name="staticStatus" name="statusSelect" id="staticStatus">
                    <option value="0">Aberto</option>
                    <option value="1">Fechado</option>
                    <option value="2">Cancelado</option>
                </select>
            </div>
        </div>
        <div class="form-group d-flex justify-content-between align-items-center">
            <label for="equipamentoSelect" class="form-label mt-4 align-self-center">Equipamento</label>
            <select class="form-select border m-2" name="selectEquipamento" id="selectEquipamento">
                @foreach($equipamentos as $equipamento)
                    <option value="{{$equipamento->id}}">#{{$equipamento->id}} - {{$equipamento->nome}} - {{$equipamento->serial}}</option>
                @endforeach
            </select>
            <a href="{{route('equipamento.create')}}">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTipoEquipamento">
                    <i class="fas fa-plus"></i>
                </button>
            </a>
        </div>

        <div class="form-group row m-2">
            <label for="staticDescricao" class="col-sm-2 col-form-label">Descrição</label>
            <div class="col-sm-10">
                <textarea name="descricao" class="form-control" id="txtDescricao" name="descricao" rows="3"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


@section('js')
    <script>

        $(document).ready(function () {
            let inputValor = $('#inputValor');
            let selectEquipamento = $('#selectEquipamento');
            let txtDescricao = $('#txtDescricao');
            let staticStatus = $('#staticStatus');

            document.addEventListener('keypress', inputValor.keypress(function (e) {
                inputValor.val(inputValor.val().replace(/\D/g, '').replace(/(\d)(\d{1})$/, '$1,$2'));
            }));


            let formNovaOrdem = $('#formNovaOrdem');
            formNovaOrdem.submit(function (e) {
                e.preventDefault();
                let valor = inputValor.val();
                let equipamento = selectEquipamento.val();
                let descricao = txtDescricao.val();
                let status = staticStatus.val();
                $.ajax({
                    type: 'POST',
                    url: '{{route('ordem.create.post')}}',
                    data: {
                        _token: '{{csrf_token()}}',
                        valor: valor,
                        status: status,
                        descricao: descricao,
                        equipamento: equipamento,
                    },
                    success: function (data) {
                        alert(data);
                    },
                });

            });
        });
    </script>
@endsection
