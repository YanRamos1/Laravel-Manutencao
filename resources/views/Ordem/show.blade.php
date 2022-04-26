@extends('Layout.body')
@section('title','Equipamentos')


@section('conteudo')
    <h1 class="text-center mt-3">Ordem número {{$ordemServico->id}}</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">Equipamento</h3>
            <p class="text-center">{{$ordemServico->equipamento['nome']}}</p>
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Cliente</h3>
            <p class="text-center">{{$ordemServico->equipamento->cliente['primeiro_nome']}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">Data de abertura</h3>
            <p class="text-center">{{$ordemServico->created_at->format('d/m/Y')}}</p>
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Status</h3>
            <p class="text-center">{{$ordemServico->status}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Descrição</h3>
            <p class="text-center">{{$ordemServico->descricao}}</p>
            <h3 class="text-center">Valor inicial</h3>
            <p class="text-center">
                R${{$ordemServico->valor_total += $servicos->sum('valor') + $materiais->sum('valor')}}
            </p>

        </div>
    </div>

    @if($ordemServico->servico->count() > 0)
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Serviços</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($servicos as $servico)
                        <tr>
                            <th scope="row">{{$servico->id}}</th>
                            <td>{{$servico->nome}}</td>
                            <td>{{$servico->valor}}</td>
                            <td>
                                <button class="btn btn-primary" id="btnDeleteServico" data-id="{{$servico->id}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    Nenhum serviço cadastrado para esta ordem de serviço.
                </div>
            </div>
        </div>
    @endif
    @if($materiais->count() > 0)
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Materiais</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($materiais as $material)
                            <tr>
                                <th scope="row">{{$material->id}}</th>
                                <td>{{$material->nome}}</td>
                                <td>{{$material->valor}}</td>
                                <td>
                                    <button class="btn btn-primary" id="btnDeleteMaterial" value="{{$material->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger container" role="alert">
            Nenhum material cadastrado para esta ordem de serviço.
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary btn-lg text-center m-2" data-toggle="modal"
                data-target="#modelAddServico">
            Novo serviço
        </button>
        <button type="button" class="btn btn-primary btn-lg text-center m-2" data-toggle="modal"
                data-target="#modelAddMaterial">
            Novo Material
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modelAddServico" tabindex="-1" role="dialog"
         aria-labelledby="modelAddServico"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Serviço</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formNovoServico" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   placeholder="Nome do serviço">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="inputValorServico" name="valor"
                                   placeholder="Valor do serviço">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao"
                                      placeholder="Descrição do serviço"></textarea>
                        </div>
                        <input hidden type="text" name="ordem" value="{{$ordemServico->id}}">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modelAddMaterial" tabindex="-1"
         role="dialog"
         aria-labelledby="Model"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formNovoMaterial" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   placeholder="Nome do serviço">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="inputValorMaterial" name="valor"
                                   placeholder="Valor do serviço">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao"
                                      placeholder="Descrição do serviço"></textarea>
                        </div>
                        <input hidden type="text" name="ordem" value="{{$ordemServico->id}}">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function (e) {
            let inputValorServico = $('#inputValorServico');
            let inputValorMaterial = $('#inputValorMaterial');

            document.addEventListener('keypress', inputValorServico.keypress(function (e) {
                inputValorServico.val(inputValorServico.val().replace(/\D/g, '').replace(/(\d)(\d{1})$/, '$1,$2'));
            }));

            document.addEventListener('keypress', inputValorMaterial.keypress(function (e) {
                inputValorMaterial.val(inputValorMaterial.val().replace(/\D/g, '').replace(/(\d)(\d{1})$/, '$1,$2'));
            }));


            let FormNovoServico = $('#formNovoServico');
            let FormNovoMaterial = $('#formNovoMaterial');
            let btnDeleteServico = $('#btnDeleteServico');
            let btnDeleteMaterial = $('#btnDeleteMaterial');


            FormNovoServico.submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{route('servico.create.post')}}',
                    type: 'POST',
                    data: FormNovoServico.serialize(),
                    success: function (data) {
                        alert(data);
                    }
                })
            })

            FormNovoMaterial.submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{route('material.create.post')}}',
                    type: 'POST',
                    data: FormNovoMaterial.serialize(),
                    success: function (data) {
                        alert(data);
                    }
                })
            })

            btnDeleteServico.click(function (e) {
                let id = $(this).data('id');
                alert(id);
            })
        })
    </script>
@endsection
