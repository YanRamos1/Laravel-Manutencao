@extends('Layout.body')
@section('title','Clientes')


@section('conteudo')

    formulario de cadastro de clientes
    <form id="formNewCliente">
        @csrf
        <legend>Novo Cliente</legend>
        <div class="form-group row m-2">
            <label for="staticFirstName" class="col-sm-2 col-form-label">Primeiro Nome</label>
            <div class="col-sm-10">
                <input type="text" name="FirstName" class="form-control-plaintext border" id="staticFirstName"
                       placeholder="Primeiro Nome">
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="staticLastName" class="col-sm-2 col-form-label">Ultimo Nome</label>
            <div class="col-sm-10">
                <input type="text" name="LastName" class="form-control-plaintext border" id="staticLastName"
                       placeholder="Ultimo Nome">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleSelect1" class="form-label mt-4">Genero</label>
            <select class="form-select" name="GenderSelect" id="genderSelect">
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            let form = $('#formNewCliente');
            form.submit(function (e) {
                let firstName = $('#staticFirstName').val();
                let lastName = $('#staticLastName').val();
                let gender = $('#genderSelect').val();
                if (!ValidaGenero) {
                    alert('Genero inválido')
                    return false;
                }
                if (ValidaNome(firstName) === false) {
                    alert('Primeiro nome inválido')
                    return false;
                } else {
                    firstName = ValidaNome(firstName)
                }


                if (ValidaNome(lastName) === false) {
                    alert('Ultimo nome inválido')
                    return false;
                } else {
                    lastName = ValidaNome(lastName);
                }

                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "PrimeiroNome": firstName,
                        "Sobrenome": lastName,
                        "Genero": gender,
                    },
                    url: "{{route('cliente.create.post')}}",
                    success: function (data) {
                        alert('Cliente criado com sucesso');
                    },
                })
            });
        });
    </script>
@endsection
