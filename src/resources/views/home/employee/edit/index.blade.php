@extends('templates.home')

@section('title')

    <h1>Funcionário / Editar</h1>

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

    <form method="post" action="{{ url("/home/employee/edit/{$dataEmployee -> id}/update") }}">
        {!! method_field('PUT') !!}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Matrícula</label>
                    <input class="form-control" id="id" name="id" type="text" value="{{ $dataEmployee -> id }}" readonly>
                </div>
            </div>
            <div class="col-sm-9">
                <!--
                    empty space
                -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>CPF</label>
                    <input class="form-control" id="cpf" name="cpf" type="text" value="{{ $dataEmployee -> cpf }}" data-mask="000.000.000-00" placeholder="000.000.000-00" autofocus>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input class="form-control" id="birth_date" name="birth_date" type="text" value="{{ $dataEmployee -> birth_date }}" data-mask="00/00/0000" placeholder="00/00/0000">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Sexo</label>
                    <select class="form-control" id="sex" name="sex" value="{{ $dataEmployee -> sex }}">
                        @foreach ($sex as $sex)
                            <option value="{{ $sex }}" @if ($sex === $dataEmployee -> sex) selected @endif>{{ $sex }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input class="form-control" id="full_name" name="full_name" type="text"  value="{{ $dataEmployee -> full_name }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" id="zip_code" name="zip_code" type="text" value="{{ $dataEmployee -> zip_code }}" data-mask="00.000-000">
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Endereço</label>
                    <input class="form-control" id="address" name="address" type="text" value="{{ $dataEmployee -> address }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Número</label>
                    <input class="form-control" id="number" name="number" type="text" value="{{ $dataEmployee -> number }}">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Complemento</label>
                    <input class="form-control" id="complement" name="complement" type="text" value="{{ $dataEmployee -> complement }}">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Bairro</label>
                    <input class="form-control" id="district" name="district" type="text" value="{{ $dataEmployee -> district }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10">
                <div class="form-group">
                    <label>Cidade</label>
                    <input class="form-control" id="city" name="city" type="text" value="{{ $dataEmployee -> city }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" id="state" name="state">
                        <option>Selecione</option>
                        @foreach ($states as $state)
                            <option value="{{ $state }}" @if ($state === $dataEmployee -> state) selected @endif>{{ $state }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Filial</label>

                        @if (count ($dataBranch) > 0)
                            <select class="form-control" id="id_branch" name="id_branch" value="{{ $dataEmployee -> id_branch }}">
                                <option value="">Selecione</option>
                                    @foreach ($dataBranch as $dataBranch)
                                        @if ($dataBranch -> status === 1)
                                            <option value="{{ $dataBranch -> id }}" @if ($dataEmployee -> id_branch === $dataBranch -> id) selected @endif >{{ $dataBranch -> social_name }}</option>
                                        @endif
                                    @endforeach
                            </select>
                        @else
                            <div class="form-group">
                                <input class="form-control" type="text" value="Nenhuma Filial Cadastrada" disabled="">
                            </div>
                        @endif

                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Cargo</label>
                    <input class="form-control" id="function" name="function" type="text" value="{{ $dataEmployee -> function }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Salário</label>
                    <input class="form-control" id="salary" name="salary" type="text" value="{{ $dataEmployee -> salary }}" data-mask="###.###.###.###.###,00" data-mask-reverse="true">
                </div> 
            </div>
        </div>

        <div class="dropdown-divider"></div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Senha">
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit" title="Atualizar Cadastro.">Atualizar</button>
        <a class="btn btn-info" href="/home/employee/list" role="button" title="Retornar à Dashboard.">Voltar</a>
    </form>

@endsection