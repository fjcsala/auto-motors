@extends('templates.home')

@section('content')

@section('title')

    <h1>Automóvel / Editar</h1>

@endsection

    @if (isset($errors) && count($errors) > 0)
        @foreach ($errors -> all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    <form method="post" action="{{ url("/home/car/edit/{$dataCar -> id}/update") }}">
        {!! method_field('PUT') !!}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>ID</label>
                    <input class="form-control" id="id" name="id" type="text" value="{{ $dataCar -> id }}" readonly>
                </div>
            </div>
            <div class="col-sm-9">
                <!--
                    empty space
                -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ $dataCar -> name }}"  autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Modelo</label>
                    <input class="form-control" id="model" name="model" type="text" value="{{ $dataCar -> model }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control" id="category" name="category">
                        <option value="">Selecione</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" @if ($category === $dataCar -> category) selected @endif>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Ano</label>
                    <input class="form-control" id="year" name="year" type="text" value="{{ $dataCar -> year }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Cor</label>
                    <input class="form-control" id="color" name="color" type="text" value="{{ $dataCar -> color }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Chassi</label>
                    <input class="form-control" id="chassi" name="chassi" type="text" value="{{ $dataCar -> chassi }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Filial</label>
                    <select class="form-control" id="id_branch" name="id_branch">
                        <option value="">Selecione</option>
                        @foreach ($dataBranch as $dataBranch)
                            @if ($dataBranch -> status === 1)
                                <option value="{{ $dataBranch -> id }}" @if ($dataBranch -> id === $dataCar -> id_branch) selected @endif>{{ $dataBranch -> social_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- empty space -->
            </div>
        </div>
        <button class="btn btn-primary" type="submit" title="Atualizar Informações.">Atualizar</button>
        <a class="btn btn-info" href="/home/car/list" role="button" title="Retornar à Listagem.">Cancelar</a>
    </form>

@endsection