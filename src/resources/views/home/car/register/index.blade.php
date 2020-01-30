@extends ('templates.register')

@section ('header')

    <h1 class="text-center">Cadastro de Automóveis</h1>

@endsection

@section ('body')

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informação!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($errors -> all() as $error)
                        <strong>
                            <li> {{ $error }} </li>
                        </strong>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    @if (isset($errors) && count($errors) > 0)
        <script>
            $('#myModal').modal('show');
        </script>
    @endif

    <form method="post" action="{{ route('car.create') }}">

        {{ csrf_field() }}

        <div class="row">

            <!-- chassi -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Chassi</label>
                    <input class="form-control" id="chassi" name="chassi" type="text"  value="{{ old('chassi') }}" data-mask="AAA.AAAAAA.AA.AAAAAA" placeholder="XXX.XXXXXX.XX.XXXXXX" autofocus>
                </div>
            </div>

            <!-- category -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control" id="category" name="category">

                        <!-- default value -->
                        <option value="">Selecione</option>

                        <!-- list categories -->
                        @foreach ($categories as $category)

                            @if (old('category') === $category)

                                <option value="{{ $category }}" selected>{{ $category }}</option>

                            @else

                                <option value="{{ $category }}">{{ $category }}</option>

                            @endif

                        @endforeach

                    </select>
                </div>
            </div>

            <!-- name -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Insira o nome do automóvel.">
                </div>
            </div>

        </div>

        <div class="row">


            <!-- year -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Ano</label>
                    <input class="form-control" id="year" name="year" type="text"  value="{{ old('year') }}" data-mask="0000" placeholder="0000">
                </div>
            </div>

            <!-- model -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Modelo</label>
                    <input class="form-control" id="model" name="model" type="text" value="{{ old('model') }}" data-mask="0000" placeholder="0000">
                </div>
            </div>

            <!-- color -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Cor</label>
                    <input class="form-control" id="color" name="color" type="text"  value="{{ old('color') }}" placeholder="Cor">
                </div>
            </div>

            <!-- branch -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Filial</label>

                    <!-- condition count branches -->
                    @if (count($dataBranch) > 0)

                        <select class="form-control" id="id_branch" name="id_branch" data-js="branch" value="{{ old('id_branch') }}">

                            <!-- default value -->
                            <option value="" data-js="optionDefault">Selecione</option>

                            <!-- list branches -->
                            @foreach ($dataBranch as $dataBranch)

                                <!-- condition for banch inactive -->
                                @if ($dataBranch -> status === 1)

                                    @if (old('id_branch') == $dataBranch -> id)

                                        <option value="{{ $dataBranch -> id }}" selected>{{ $dataBranch -> social_name }}</option>

                                    @else

                                        <option value="{{ $dataBranch -> id }}">{{ $dataBranch -> social_name }}</option>

                                    @endif
                                    
                                @endif

                            @endforeach

                        </select>

                    @else

                        <input class="form-control" id="branch" name="branch" type="text" value="Nenhuma Filial Cadastrada" readonly>
                    
                    @endif

                </div>
            </div>
        </div>

        <script>
            $branch = document.querySelector('[data-js="branch"]');
            $optionDefault = document.querySelector('[data-js="optionDefault"]');

            if ($branch.length <= 1)
            {
                $branch.disabled = true;
                $optionDefault.setAttribute("label", "Não há filiais cadastradas.");
            }
        </script>

@endsection

@section ('footer')

    <div class=text-right>
        <button class="btn btn-primary" type="submit" title="Salvar Cadastro.">Salvar</button>
        <a class="btn btn-info" href="{{ route('dashboard') }}" role="button" title="Retornar à Dashboard.">Voltar</a>
    </div>

@endsection