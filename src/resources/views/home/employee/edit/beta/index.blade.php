@extends ('templates.edit')

@section ('header')

    <h1 class="text-center">Editar Funcionário</h1>

@endsection

@section ('body')

    <form method="post" action="{{ route('employee.create') }}">

        {{ csrf_field() }}

        <div class="row">

            <!-- cpf -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>CPF</label>
                    <input class="form-control" id="cpf" name="cpf" type="text" value="{{ $dataEmployee -> cpf }}" data-mask="000.000.000-00" placeholder="000.000.000-00" autofocus>
                </div>
            </div>

            <!-- birth_date -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input class="form-control" id="birth_date" name="birth_date" type="text" value="{{ $dataEmployee -> birth_date }}" data-mask="00/00/0000" placeholder="00/00/0000">
                </div>
            </div>

            <!-- sex -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Sexo</label>
                    <select class="form-control" id="sex" name="sex">

                        <!-- default value -->
                        <option value="">Selecione</option>

                        <!-- list sex -->
                        @foreach ($sex as $sex)

                            <!-- return option value based on employee data -->
                            <option value="{{ $sex }}" @if ($sex === $dataEmployee -> sex) selected @endif> {{ $sex }} </option>
                        
                        @endforeach

                    </select>
                </div>
            </div>

        </div>

        <div class="row">

            <!-- full_name -->
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input class="form-control" id="full_name" name="full_name" type="text" value="{{ $dataEmployee -> full_name }}" placeholder="Insira o nome completo do funcionário.">
                </div>
            </div>

        </div>

        <div class="row">

            <!-- cep -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>CEP</label>
                    <input class="form-control" id="zip_code" name="zip_code" type="text" value="{{ $dataEmployee -> zip_code }}" data-mask="00.000-000" placeholder="00.000-000">
                </div>
            </div>

            <!-- address -->
            <div class="col-sm-9">
                <label>Endereço</label>
                <input class="form-control" id="addres" name="address" type="text" value="{{ $dataEmployee -> address }}" placeholder="Insira o endereço do funcionário.">
            </div>

        </div>

        <div class="row">

            <!-- number -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Número</label>
                    <input class="form-control" id="number" name="number" type="text" value="{{ $dataEmployee -> number }}" data-mask="#" placeholder="Nº">
                </div>
            </div>

            <!-- complement -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Complemento</label>
                    <input class="form-control" id="complement" name="complement" type="text" value="{{ $dataEmployee -> complement }}" placeholder="Complemento do endereço.">
                </div>
            </div>

            <!-- district -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Bairro</label>
                    <input class="form-control" id="district" name="district" type="text" value="{{ $dataEmployee -> district }}" placeholder="Insira o bairro do funcionário.">
                </div>
            </div>

        </div>

        <div class="row">

            <!-- city -->
            <div class="col-sm-10">
                <div class="form-group">
                    <label>Cidade</label>
                    <input class="form-control" id="city" name="city" type="text" value="{{ $dataEmployee -> city }}" placeholder="Insira a cidade do funcionário.">
                </div>
            </div>

            <!-- state -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" id="state" name="state">

                        <!-- default value -->
                        <option value="">Selecione</option>

                        <!-- list states -->
                        @foreach ($states as $state)

                            <!-- return option value based on employee data -->
                            <option value="{{ $state }}" @if ($state === $dataEmployee -> state) selected @endif > {{ $state }} </option>

                        @endforeach

                    </select>
                </div>
            </div>

        </div>

        <div class="row">

            <!-- branch -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Filial</label>

                        <!-- count result branches condition -->
                        @if (count ($dataBranch) > 0)

                            <select class="form-control" id="id_branch" name="id_branch">

                                <!-- default value -->
                                <option value="">Selecione</option>

                                    <!-- list branches -->
                                    @foreach ($dataBranch as $branch)

                                        <!-- condition branch check status -->
                                        @if ($branch -> status === 1)

                                            <!-- return option value based on branch data -->
                                            <option value="{{ $branch -> id }}" @if ($branch -> id === $dataEmployee -> id_branch) selected @endif> {{ $branch -> social_name }} </option>

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

            <!-- function -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Cargo</label>
                    <input class="form-control" id="function" name="function" type="text" value="{{ $dataEmployee -> function }}" placeholder="Insira a função do funcionário.">
                </div>
            </div>

            <!-- salary -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Salário</label>
                    <input class="form-control" id="salary" name="salary" type="text" value="{{ $dataEmployee -> salary }}" data-mask="###.###.###.###.###,00" data-mask-reverse="true" placeholder="R$ 00.000,00">
                </div> 
            </div>

        </div>

        <div class="dropdown-divider"></div>

        <div class="row">

            <!-- password -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Insira a senha para acesso.">
                </div>
            </div>

        </div>

@endsection

@section ('footer')

        <div class=text-right>
            <button class="btn btn-primary" type="submit" title="Atualizar Cadastro.">Atualizar</button>
            <a class="btn btn-info" href="{{ route('dashboard') }}" role="button" title="Retornar à Dashboard.">Voltar</a>
        </div>

    </form>

@endsection