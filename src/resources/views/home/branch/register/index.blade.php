@extends ('templates.register')

@section ('header')

    <h1 class="text-center">Cadastro de Filiais</h1>

@endsection

@section ('body')

    @if (isset($errors) && count($errors) > 0)
        @foreach($errors -> all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    <form method="post" action="{{ route('branch.create') }}">

        {{ csrf_field() }}

        <div class="row">
            <!-- cnpj -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CNPJ</label>
                    <input class="form-control" id="cnpj" name="cnpj" type="text" value="{{ old('cnpj') }}" data-mask="00.000.000/0000-00" placeholder="00.000.000/0000-00" autofocus>
                </div>
            </div>

            <!-- ie -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Inscrição Estadual</label>
                    <input class="form-control" id="ie" name="ie" type="text" value="{{ old('ie') }}" data-mask="000000000000000" placeholder="000000000000000">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- social_name -->
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Razão Social</label>
                    <input class="form-control" id="social_name" name="social_name" type="text" value="{{ old('social_name') }}" placeholder="Insira a razão social da filial.">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- fantasy_name -->
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nome Fantasia</label>
                    <input class="form-control" id="fantasy_name" name="fantasy_name" type="text" value="{{ old('fantasy_name') }}" placeholder="Insira o nome fantasia da filial.">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- zip_code -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" id="zip_code" name="zip_code" type="text" value="{{ old('zip_code') }}" data-mask="00.000-000" placeholder="00.000-000">
                </div>
            </div>

            <!-- address -->
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Endereço</label>
                    <input class="form-control" id="address" name="address" type="text" value="{{ old('address') }}" placeholder="Insira o endereço da filial.">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- number -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Número</label>
                    <input class="form-control" id="number" name="number" type="text" value="{{ old('number') }}" data-mask="00000" placeholder="Nº">
                </div>
            </div>

            <!-- complement -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Complemento</label>
                    <input class="form-control" id="complement" name="complement" type="text" value="{{ old('complement') }}" placeholder="Complemento do endereço.">
                </div>
            </div>

            <!-- district -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Bairro</label>
                    <input class="form-control" id="district" name="district" type="text" value="{{ old('district') }}" placeholder="Insira o bairro da filial.">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- city -->
            <div class="col-sm-10">
                <div class="form-group">
                    <label>Cidade</label>
                    <input class="form-control" id="city" name="city" type="text" value="{{ old('city') }}" placeholder="Insira a cidade da filial.">
                </div>
            </div>

            <!-- state -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" id="state" name="state" value="{{ old('state') }}">

                        <!-- default select -->
                        <option value="">Selecione</option>

                        <!-- create state options -->
                        @foreach ($states as $state)

                            <option value="{{ $state }}">{{ $state }}</option>
                                
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

@endsection

@section ('footer')

        <div class=text-right>
            <button class="btn btn-primary" type="submit" title="Salvar Cadastro.">Salvar</button>
            <a class="btn btn-info" href="{{ route('dashboard') }}" role="button" title="Retornar à Dashboard.">Voltar</a>
        </div>

    </form>

@endsection