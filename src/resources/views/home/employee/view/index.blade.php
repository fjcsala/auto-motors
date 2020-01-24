@extends ('templates.view')

@section ('header')

    <h1 class="text-center">Visualizar Funcionário</h1>

@endsection

@section ('body')

    <form>

        <div class="row">

            <!-- cpf -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>CPF</label>
                    <input class="form-control" id="cpf" name="cpf" type="text" value="{{ $dataEmployee -> cpf }}" disabled>
                </div>
            </div>

            <!-- birth_date -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input class="form-control" id="birth_date" name="birth_date" type="text" value="{{ $dataEmployee -> birth_date }}" data-mask="00/00/0000" disabled>
                </div>
            </div>

            <!-- sex -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Sexo</label>
                    <input class="form-control" type="text" value="{{ $dataEmployee -> sex }}" disabled>
                </div>
            </div>

        </div>

        <div class="row">

            <!-- full_name -->
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input class="form-control" id="full_name" name="full_name" type="text" value="{{ $dataEmployee -> full_name }}" disabled>
                </div>
            </div>

        </div>

        <div class="row">

            <!-- cep -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" id="zip_code" name="zip_code" type="text" value="{{ $dataEmployee -> zip_code }}" disabled>
                </div>
            </div>

            <!-- address -->
            <div class="col-sm-9">
                <label>Endereço</label>
                <input class="form-control" id="addres" name="address" type="text" value="{{ $dataEmployee -> address }}" disabled>
            </div>

        </div>

        <div class="row">

            <!-- number -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Número</label>
                    <input class="form-control" id="number" name="number" type="text" value="{{ $dataEmployee -> number }}" disabled>
                </div>
            </div>

            <!-- complement -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Complemento</label>
                    <input class="form-control" id="complement" name="complement" type="text" value="{{ $dataEmployee -> complement }}" disabled>
                </div>
            </div>

            <!-- district -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Bairro</label>
                    <input class="form-control" id="district" name="district" type="text" value="{{ $dataEmployee -> district }}" disabled>
                </div>
            </div>

        </div>

        <div class="row">

            <!-- city -->
            <div class="col-sm-10">
                <div class="form-group">
                    <label>Cidade</label>
                    <input class="form-control" id="city" name="city" type="text" value="{{ $dataEmployee -> city }}" disabled>
                </div>
            </div>

            <!-- state -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Estado</label>
                    <input class="form-control" type="text" value="{{ $dataEmployee -> state }}" disabled>
                </div>
            </div>

        </div>

        <div class="row">

            <!-- branch -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Filial</label>
                    @foreach ($dataBranch as $branch)

                        @if ($dataEmployee -> id_branch === $branch -> id)
                            <input class="form-control" type="text" value="{{ $branch -> social_name }}" disabled>
                        @endif

                    @endforeach
                </div>

            </div>

            <!-- function -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Cargo</label>
                    <input class="form-control" id="function" name="function" type="text" value="{{ $dataEmployee -> function }}" disabled>
                </div>
            </div>

            <!-- salary -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Salário</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">R$</span></div>
                            <input class="form-control" id="exampleInputAmount" type="text" value="{{ $dataEmployee -> salary }}" placeholder="R$ 000.000,00" data-mask="##0.000,00" data-mask-reverse="true" disabled>
                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection

@section ('footer')

        <div class=text-right>
            <a class="btn btn-primary" href="{{ url("/home/employee/edit/{$dataEmployee -> id}") }}" role="button" title="Editar Informações.">Editar</a>
            <a class="btn btn-info" href="{{ route('employee.list') }}" role="button" title="Retornar à Listagem.">Voltar</a>
        </div>

    </form>

@endsection