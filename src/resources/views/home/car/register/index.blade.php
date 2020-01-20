@extends('templates.home')

@section('title')

    <h1>Automóveis / Cadastrar</h1>

@endsection

@section('content')

    @if (isset($errors) && count($errors) > 0)
        @foreach($errors -> all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    <form method="post" action="{{ url('/home/car/create') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" id="name" name="name" type="text" value="Auto Motors" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Modelo</label>
                    <input class="form-control" id="model" name="model" type="text" value="{{ old('model') }}" autofocus>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control" id="category" name="category">
                        <option>Selecione</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Ano</label>
                    <input class="form-control" id="year" name="year" type="text"  value="{{ old('year') }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Cor</label>
                    <input class="form-control" id="color" name="color" type="text"  value="{{ old('color') }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Chassi</label>
                    <input class="form-control" id="chassi" name="chassi" type="text"  value="{{ old('chassi') }}" maxlength="17">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Filial</label>
                    @if(count($dataBranch) > 0)
                        <select class="form-control" id="id_branch" name="id_branch" value="{{ old('id_branch') }}">
                            <option>Selecione</option>
                                @foreach ($dataBranch as $dataBranch)
                                    @if ($dataBranch -> status === 1)
                                        <option value="{{ $dataBranch -> id }}">{{ $dataBranch -> social_name }}</option>
                                    @endif
                                @endforeach
                        </select>
                    @else
                        <input class="form-control" id="branch" name="branch" type="text" value="Nenhuma Filial Cadastrada" readonly>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <!-- empty space -->
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Cadastrar</button>
        <a class="btn btn-info" href="/home" role="button">Voltar</a>
    </form>

@endsection