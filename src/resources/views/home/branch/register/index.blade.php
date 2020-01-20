@extends('templates.home')

@section ('title')

    <h1>Filial / Cadastrar</h1>

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

    <form method="post" action="{{ url('home/branch/create') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CNPJ</label>
                    <input class="form-control" id="cnpj" name="cnpj" type="text" value="{{ old('cnpj') }}" data-mask="00.000.000/0000-00" required autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Inscrição Estadual</label>
                    <input class="form-control" id="ie" name="ie" type="text" value="{{ old('ie') }}" data-mask="0000000000000" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Razão Social</label>
                    <input class="form-control" id="social_name" name="social_name" type="text" value="{{ old('social_name') }}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nome Fantasia</label>
                    <input class="form-control" id="fantasy_name" name="fantasy_name" type="text" value="{{ old('fantasy_name') }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" id="zip_code" name="zip_code" type="text" value="{{ old('zip_code') }}" data-mask="00.000-000" required>
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
                    <input class="form-control" id="address" name="address" type="text" value="{{ old('address') }}" required>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Número</label>
                    <input class="form-control" id="number" name="number" type="text" value="{{ old('number') }}" data-mask="00000" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Complemento</label>
                    <input class="form-control" id="complement" name="complement" type="text" value="{{ old('complment') }}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Bairro</label>
                    <input class="form-control" id="district" name="district" type="text" value="{{ old('district') }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Cidade</label>
                    <input class="form-control" id="city" name="city" type="text" value="{{ old('city') }}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" id="state" name="state" required>
                        <option value="">Selecione</option>
                        @foreach ($states as $state)
                            <option value="{{ $state }}">{{ $state }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit" title="Salvar Cadastro.">Salvar</button>
        <a class="btn btn-info" href="/home" role="button" title="Retornar à Dashboard.">Voltar</a>
    </form>

@endsection