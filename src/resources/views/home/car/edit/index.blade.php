@extends ('templates.edit')

@section ('header')

    <h1 class="text-center">Editar Automóvel</h1>

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

    <form method="post" action="{{ url("/home/car/edit/{$dataCar -> id}/update") }}">

        {!! method_field('PUT') !!}
        
        {{ csrf_field() }}

        <div class="row">

            <!-- chassi -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Chassi</label>
                    <input class="form-control" id="chassi" name="chassi" type="text"  value="{{ $dataCar -> chassi }}" data-mask="AAA.AAAAAA.AA.AAAAAA" placeholder="XXX.XXXXXX.XX.XXXXXX" autofocus>
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

                            <!-- return option value based on car data -->
                            <option value="{{ $category }}" @if ($category === $dataCar -> category) selected @endif > {{ $category }} </option>

                        @endforeach

                    </select>
                </div>
            </div>

            <!-- name -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ $dataCar -> name }}" placeholder="Insira o nome do automóvel.">
                </div>
            </div>

        </div>

        <div class="row">

            <!-- year -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Ano</label>
                    <input class="form-control" id="year" name="year" type="text"  value="{{ $dataCar -> year }}" data-mask="0000" placeholder="0000">
                </div>
            </div>

            <!-- model -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Modelo</label>
                    <input class="form-control" id="model" name="model" type="text" value="{{ $dataCar -> model }}" data-mask="0000" placeholder="0000">
                </div>
            </div>

            <!-- color -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Cor</label>
                    <input class="form-control" id="color" name="color" type="text"  value="{{ $dataCar -> color }}" placeholder="Cor">
                </div>
            </div>

            <!-- branch -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Filial</label>

                    <!-- condition count branches -->
                    @if (count($dataBranch) > 0)

                        <select class="form-control" id="id_branch" name="id_branch" data-js="branch">

                            <!-- default value -->
                            <option value="" data-js="optionDefault">Selecione</option>

                            <!-- list branches -->
                            @foreach ($dataBranch as $dataBranch)

                                <option value="{{ $dataBranch -> id }}" @if ($dataBranch -> id === $dataCar -> id_branch) selected @endif> {{ $dataBranch -> social_name }} </option>

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
            <button class="btn btn-primary" type="submit" title="Atualizar Cadastro.">Atualizar</button>
            <a class="btn btn-info" href="{{ route('car.list') }}" role="button" title="Retornar à Listagem.">Voltar</a>
        </div>

    </form>

@endsection