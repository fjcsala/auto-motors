@extends('templates.home')

@section('title')

    <h1>Funcionário / Cadastrar</h1>

@endsection

@section('content')

    @if (isset($errors) && count($errors) > 0)
        @foreach ($errors -> all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    <form method="post" action="{{ url('/home/employee/create') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CPF</label>
                    <input class="form-control" id="cpf" name="cpf" type="text" value="{{ old('cpf') }}" data-mask="000.000.000-00" autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input class="form-control" id="birth_date" name="birth_date" type="text" value="{{ old('birth_date') }}" data-mask="00/00/0000">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input class="form-control" id="full_name" name="full_name" type="text" value="{{ old('full_name') }}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Sexo</label>
                    <select class="form-control" id="sex" name="sex">
                        <option value="">Selecione</option>
                        @foreach ($sex as $sex)
                            <option value="{{ $sex }}">{{ $sex }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" id="zip_code" name="zip_code" type="text" value="{{ old('zip_code') }}" data-mask="00.000-000">
                </div>
            </div>
            <div class="col-sm-6">
                <!-- empty space -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10">
                <div class="form-group">
                    <label>Endereço</label>
                    <input class="form-control" id="addres" name="address" type="text" value="{{ old('address') }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Número</label>
                    <input class="form-control" id="number" name="number" type="text" value="{{ old('number') }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Complemento</label>
                    <input class="form-control" id="complement" name="complement" type="text" value="{{ old('complement') }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Bairro</label>
                    <input class="form-control" id="district" name="district" type="text" value="{{ old('district') }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Cidade</label>
                    <input class="form-control" id="city" name="city" type="text" value="{{ old('city') }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" id="state" name="state">
                        <option value="">Selecione</option>
                        @foreach ($states as $state)
                            <option value="{{ $state }}">{{ $state }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Filial</label>

                        @if (count ($dataDB) > 0)
                            <select class="form-control" id="id_branch" name="id_branch" value="{{ old('branch') }}">
                                <option value="">Selecione</option>
                                    @foreach ($dataDB as $dataDB)
                                        @if ($dataDB -> status === 1)
                                            <option value="{{ $dataDB -> id }}">{{ $dataDB -> social_name }}</option>
                                        @endif
                                    @endforeach
                            </select>
                        @else
                            <div class="form-group">
                                <input class="form-control" type="text" value="Nenhuma Filial Cadastrada" readonly>
                            </div>
                        @endif

                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Cargo</label>
                    <input class="form-control" id="function" name="function" type="text" value="{{ old('function') }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Salário</label>
                    <input class="form-control" id="salary" name="salary" type="text" value="{{ old('salary') }}">
                </div> 
            </div>
        </div>

        <div class="dropdown-divider"></div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" id="password" name="password" type="password">
                </div>
            </div>
            <div class="col-sm-6">
                <!-- empty space -->
            </div>
        </div>

        <button class="btn btn-primary" type="submit" title="Salvar Cadastro.">Salvar</button>
        <a class="btn btn-info" href="/home" role="button" title="Retornar à Dashboard.">Voltar</a>
    </form>

@endsection