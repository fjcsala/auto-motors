@extends ('templates.edit')

@section ('header')
    <h1 class="text-center">Editar Filial</h1>
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

    <form method="post" action="{{ url("/home/branch/edit/{$dataBranch -> id}/update") }}">
    
    {!! method_field('PUT') !!}

    {{ csrf_field() }}

    <div class="row">

        <!-- state -->
        <div class="col-sm-2">
            <div class="form-group">
                <label>Estado</label>
                <select class="form-control" id="state" name="state" data-js="state" autofocus>

                    <!-- default select -->
                    <option value="">Selecione</option>

                    <!-- create state options -->
                    @foreach ($states as $state)

                    <!-- return option value based on branch data -->
                    <option value="{{ $state }}" @if ($state === $dataBranch -> state) selected @endif> {{ $state }} </option>
                            
                    @endforeach

                </select>
            </div>
        </div>

        <!-- city -->
        <div class="col-sm-10">
            <div class="form-group">
                <label>Cidade</label>
                <input class="form-control" id="city" name="city" type="text" value="{{ $dataBranch -> city }}" placeholder="Insira a cidade da filial.">
            </div>
        </div>

    </div>

    <div class="row">
        <!-- cnpj -->
        <div class="col-sm-6">
            <div class="form-group">
                <label>CNPJ</label>
                <input class="form-control" id="cnpj" name="cnpj" type="text" value="{{ $dataBranch -> cnpj }}" data-mask="00.000.000/0000-00" placeholder="00.000.000/0000-00">
            </div>
        </div>

        <!-- ie -->
        <div class="col-sm-6">
            <div class="form-group">
                <label>Inscrição Estadual</label>
                <input class="form-control ie" id="ie" name="ie" type="text" data-js="ie" value="{{ $dataBranch -> ie }}">
            </div>
        </div>
    </div>

    <div class="row">
        <!-- social_name -->
        <div class="col-sm-12">
            <div class="form-group">
                <label>Razão Social</label>
                <input class="form-control" id="social_name" name="social_name" type="text" value="{{ $dataBranch -> social_name }}" placeholder="Insira a razão social da filial.">
            </div>
        </div>
    </div>

    <div class="row">
        <!-- fantasy_name -->
        <div class="col-sm-12">
            <div class="form-group">
                <label>Nome Fantasia</label>
                <input class="form-control" id="fantasy_name" name="fantasy_name" type="text" value="{{ $dataBranch -> fantasy_name }}" placeholder="Insira o nome fantasia da filial.">
            </div>
        </div>
    </div>

    <div class="row">
        <!-- zip_code -->
        <div class="col-sm-3">
            <div class="form-group">
                <label>CEP</label>
                <input class="form-control" id="zip_code" name="zip_code" type="text" value="{{ $dataBranch -> zip_code }}" data-mask="00.000-000" placeholder="00.000-000">
            </div>
        </div>

        <!-- address -->
        <div class="col-sm-9">
            <div class="form-group">
                <label>Endereço</label>
                <input class="form-control" id="address" name="address" type="text" value="{{ $dataBranch -> address }}" placeholder="Insira o endereço da filial.">
            </div>
        </div>
    </div>

    <div class="row">
        <!-- number -->
        <div class="col-sm-2">
            <div class="form-group">
                <label>Número</label>
                <input class="form-control" id="number" name="number" type="text" value="{{ $dataBranch -> number }}" data-mask="#" placeholder="Nº">
            </div>
        </div>

        <!-- complement -->
        <div class="col-sm-5">
            <div class="form-group">
                <label>Complemento</label>
                <input class="form-control" id="complement" name="complement" type="text" value="{{ $dataBranch -> complement }}" placeholder="Complemento do endereço.">
            </div>
        </div>

        <!-- district -->
        <div class="col-sm-5">
            <div class="form-group">
                <label>Bairro</label>
                <input class="form-control" id="district" name="district" type="text" value="{{ $dataBranch -> district }}" placeholder="Insira o bairro da filial.">
            </div>
        </div>
    </div>

    <script>
        $state = document.querySelector('[data-js="state"]');
        $ie = document.querySelector('[data-js="ie"]');
        $ajax = new XMLHttpRequest();

        if (stateValueVerify($state.value) !== false)
        {
            ie_mask($state.value);
        }

        else
        {
            ieDisabled();
        }

        $state.addEventListener('change', ie_mask, false);

        function ie_mask ()
        {
            $uf = $state.value;

            if (stateValueVerify($uf) === false)
            {
                ieDisabled();
            }

            $url = "/home/branch/ie-mask/"+$uf+"/";

            $ajax.open("GET", $url);
            $ajax.send();
            $ajax.addEventListener('readystatechange', stateChange);
        }

        function stateChange ()
        {
            if (requestSuccess())
            {
                $ie_mask = $ajax.responseText;

                ieEnabled();
                // cleanField();
                setMask($ie_mask);
                setPlaceholder($ie_mask);
            }
        }

        function requestSuccess()
        {
            return $ajax.readyState === 4 && $ajax.status === 200;
        }

        function cleanField()
        {
            $ie.value = "";
        }
                
        function setMask($mask)
        {
            $('.ie').mask($mask);
        }

        function setPlaceholder($mask)
        {
            $ie.setAttribute("placeholder", $mask);
        }

        function stateValueVerify($data)
        {
            if ($data === "")
            {
                return false;
            }
        }

        function ieDisabled()
        {
            cleanField();
            $ie.removeAttribute("maxlength");
            $ie.removeAttribute("autocomplete");
            $ie.setAttribute("placeholder", "Selecione o estado da filial.");
            $ie.disabled = true;
        }

        function ieEnabled()
        {
            $ie.removeAttribute("readonly");
            $ie.disabled = false;
        }
    </script>

@endsection

@section ('footer')

        <div class=text-right>
            <button class="btn btn-primary" type="submit" title="Atualizar Cadastro.">Atualizar</button>
            <a class="btn btn-info" href="{{ route('branch.list') }}" role="button" title="Retornar à Listagem.">Voltar</a>
        </div>

    </form>

@endsection