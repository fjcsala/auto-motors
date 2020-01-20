@extends('templates.home')

@section ('title')

    <h1>Filial / Editar</h1>

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

    <form method="post" action="{{ url("/home/branch/edit/{$dataDB -> id}/update") }}">
        {{ csrf_field() }}
        {!! method_field('PUT') !!}
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>ID</label>
                    <input class="form-control" id="id" name="id" type="text" value="{{ $dataDB -> id }}" disabled>
                </div>
            </div>
            <div class="col-sm-9">
                <!--
                    empty space.
                -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CNPJ</label>
                    <input class="form-control" id="cnpj" name="cnpj" type="text" value="{{ $dataDB -> cnpj }}" autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Inscrição Estadual</label>
                    <input class="form-control" id="ie" name="ie" type="text" value="{{ $dataDB -> ie }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Razão Social</label>
                    <input class="form-control" id="social_name" name="social_name" type="text" value="{{ $dataDB -> social_name }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nome Fantasia</label>
                    <input class="form-control" id="fantasy_name" name="fantasy_name" type="text" value="{{ $dataDB -> fantasy_name }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" id="zip_code" name="zip_code" type="text" value="{{ $dataDB -> zip_code }}">
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
                    <input class="form-control" id="address" name="address" type="text" value="{{ $dataDB -> address }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Número</label>
                    <input class="form-control" id="number" name="number" type="text" value="{{ $dataDB -> number }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Complemento</label>
                    <input class="form-control" id="complement" name="complement" type="text" value="{{ $dataDB -> complement }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Bairro</label>
                    <input class="form-control" id="district" name="district" type="text" value="{{ $dataDB -> district }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Cidade</label>
                    <input class="form-control" id="city" name="city" type="text" value="{{ $dataDB -> city }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" id="state" name="state"">
                        <option value="">Selecione</option>
                        @foreach ($states as $state)
                            <option value="{{ $state }}" @if ($state === $dataDB -> state) selected @endif>{{ $state }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit" title="Atualizar Informações.">Atualizar</button>
        <a class="btn btn-info" href="/home/branch/list" role="button" title="Retornar à Listagem.">Voltar</a>
    </form>

@endsection