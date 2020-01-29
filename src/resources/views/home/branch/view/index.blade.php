@extends ('templates.view')

@section ('header')
    <h1 class="text-center">Visualizar Filial</h1>
@endsection

@section ('body')

    <form>

        <div class="row">
            <!-- cnpj -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CNPJ</label>
                    <input class="form-control" id="cnpj" name="cnpj" type="text" value="{{ $dataBranch -> cnpj }}" disabled>
                </div>
            </div>

            <!-- ie -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Inscrição Estadual</label>
                    <input class="form-control" id="ie" name="ie" type="text" value="{{ $dataBranch -> ie }}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- social_name -->
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Razão Social</label>
                    <input class="form-control" id="social_name" name="social_name" type="text" value="{{ $dataBranch -> social_name }}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- fantasy_name -->
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nome Fantasia</label>
                    <input class="form-control" id="fantasy_name" name="fantasy_name" type="text" value="{{ $dataBranch -> fantasy_name }}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- zip_code -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" id="zip_code" name="zip_code" type="text" value="{{ $dataBranch -> zip_code }}" disabled>
                </div>
            </div>

            <!-- address -->
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Endereço</label>
                    <input class="form-control" id="address" name="address" type="text" value="{{ $dataBranch -> address }}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- number -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Número</label>
                    <input class="form-control" id="number" name="number" type="text" value="{{ $dataBranch -> number }}" disabled>
                </div>
            </div>

            <!-- complement -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Complemento</label>
                    <input class="form-control" id="complement" name="complement" type="text" value="{{ $dataBranch -> complement }}" disabled>
                </div>
            </div>

            <!-- district -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Bairro</label>
                    <input class="form-control" id="district" name="district" type="text" value="{{ $dataBranch -> district }}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- city -->
            <div class="col-sm-10">
                <div class="form-group">
                    <label>Cidade</label>
                    <input class="form-control" id="city" name="city" type="text" value="{{ $dataBranch -> city }}" disabled>
                </div>
            </div>

            <!-- state -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Estado</label>
                    <input class="form-control" id="state" name="state" type="text" value="{{ $dataBranch -> state }}" disabled>
                </div>
            </div>
        </div>

@endsection

@section ('footer')

        <div class=text-right>
            <a class="btn btn-primary" href="{{ url("home/branch/edit/{$dataBranch -> id}") }}" role="button" title="Editar Informações.">Editar</a>
            <a class="btn btn-info" href="{{ route('branch.list') }}" role="button" title="Retornar à Listagem.">Voltar</a>
        </div>

    </form>

@endsection