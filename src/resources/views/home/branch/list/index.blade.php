@extends ('templates.list')

@section ('header')

    <h1 class="text-center">Listagem de Filiais</h1>

@endsection

@section ('body')

    <!-- modal messages -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informação!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <strong>{{ session('message') }}</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    @if (session('message'))
        <script>
            $('#myModal').modal('show');
        </script>
    @endif

    <input type="hidden" name="_token" id="token"  data-js="token" value="{{ csrf_token() }}">

    <!-- table -->
    <table class="table table-bordered table-hover text-center">

        <!-- header -->
        <thead class="thead-light align-middle">
            <!-- cols -->
            <tr>
                <!-- check -->
                <th scope="col"></th>
                <!-- social_name -->
                <th scope="col" class="text-left">RAZÃO SOCIAL</th>
                <!-- cnpj -->
                <th scope="col">CNPJ</th>
                <!-- ie -->
                <th scope="col">IE</th>
                <!-- city -->
                <th scope="col">CIDADE</th>
                <!-- state -->
                <th scope="col">ESTADO</th>
                <!-- action buttons -->
                <th scope="col" width="200px">AÇÕES</th>
            </tr>
        </thead>

        <tbody>

            <!-- data loop -->
            @foreach ($dataBranch as $data)

                <!-- rows -->
                    
                <!-- status verification -->
                @if ($data -> status === 0)

                    <tr  class="table-danger">

                @else

                    <tr>

                @endif
                    <!-- check -->
                    <td class="align-middle"><input type="checkbox" id="branchCheck" name="branchCheck" data-js="branchCheck" value="{{ $data -> id }}"></td>

                    <!-- social_name -->
                    <td class="align-middle text-left"> {{ $data -> social_name }} </td>

                    <!-- cnpj -->
                    <td class="align-middle"> {{ $data -> cnpj }} </td>

                    <!-- ie -->
                    <td class="align-middle"> {{ $data -> ie }} </td>

                    <!-- city -->
                    <td class="align-middle"> {{ $data -> city }} </td>

                    <!-- state -->
                    <td class="align-middle"> {{ $data -> state }} </td>
                        
                    <!-- action buttons -->
                    <td>

                        <form action="" data-js="modal">
                            <!-- view -->
                            <a class="btn btn-info btn-sm" href="{{ url("/home/branch/view/{$data -> id}") }}" role="button" title="Visualizar"><i class="fas fa-eye"></i></a>
                        
                            <!-- edit -->
                            <a class="btn btn-primary btn-sm" href="{{ url("/home/branch/edit/{$data -> id}") }}" role="button" title="Editar"><i class="fas fa-edit"></i></a>

                            <!-- status verification -->
                            @if ($data -> status === 0)

                            <!-- active -->
                            <a class="btn btn-success btn-sm" data-js="active" href="{{ url("/home/branch/edit/{$data -> id}/active") }}" data-toggle="modal" data-target="#activeBranch" role="button" title="Ativar"><i class="fas fa-check-circle"></i></a>

                            @else

                            <!-- inactive -->
                            <a class="btn btn-danger btn-sm" data-js="inactive" href="{{ url("/home/branch/edit/{$data -> id}/inactive") }}" data-toggle="modal" data-target="#inactiveBranch" role="button" title="Inativar"><i class="fas fa-ban"></i></a>

                            @endif

                            <!-- delete -->
                            <a class="btn btn-danger btn-sm" data-js="remove" href="{{ url("/home/branch/edit/{$data -> id}/remove") }}" data-toggle="modal" data-target="#removeBranch" role="button" title="Remover"><i class="fas fa-trash-alt"></i></a>
                        </form>

                    </td>

                </tr>

            @endforeach

        </tbody>
    
    </table>

    <!-- modals -->

    <!-- active modal -->
    <div class="modal fade" id="activeBranch" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Informação!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <strong>DESEJA ATIVAR ESTA FILIAL?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a class="btn btn-info" role="button" data-js="activeYes" href="#">Sim</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- inactive modal -->
    <div class="modal fade" id="inactiveBranch" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Informação!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <strong>DESEJA DESATIVAR ESTA FILIAL?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a class="btn btn-info" role="button" data-js="inactiveYes" href="#">Sim</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- remove modal -->
    <div class="modal fade" id="removeBranch" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Informação!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <strong>DESEJA REMOVER ESTA FILIAL?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a class="btn btn-info" role="button" data-js="removeYes" href="#">Sim</a>
                </div>
            </div>
        </div>
    </div>

    <script>

        $active = document.querySelectorAll('[data-js="active"]');
        $inactive = document.querySelectorAll('[data-js="inactive"]');
        $remove = document.querySelectorAll('[data-js="remove"]');

        $activeYes = document.querySelector('[data-js="activeYes"]');
        $inactiveYes = document.querySelector('[data-js="inactiveYes"]');
        $removeYes = document.querySelector('[data-js="removeYes"]');

        Array.prototype.forEach.call($active, function($element, $index, $array)
        {
            $element.addEventListener('click', function($e)
            {
                $e.preventDefault();
                active ($element);
            });
        })

        Array.prototype.forEach.call($inactive, function($element, $index, $array)
        {
            $element.addEventListener('click', function($e)
            {
                $e.preventDefault();
                inactive ($element);
            });
        })

        Array.prototype.forEach.call($remove, function($element, $index, $array)
        {
            $element.addEventListener('click', function($e)
            {
                $e.preventDefault();
                remove ($element);
            });
        })

        function form ($element)
        {
            var $form = document.querySelector('[data-js="modal"]');
            $form.action = $element.href;
            $form.submit();
        }

        function active ($element)
        {
            var $activeYes = document.querySelector('[data-js="activeYes"]');

            $activeYes.addEventListener('click', function($e){
            $e.preventDefault();
            form($element);
            })
        }

        function inactive ($element)
        {
            var $inactiveYes = document.querySelector('[data-js="inactiveYes"]');

            $inactiveYes.addEventListener('click', function($e){
            $e.preventDefault();
            form($element);
            })
        }

        function remove ($element)
        {
            var $removeYes = document.querySelector('[data-js="removeYes"]');

            $removeYes.addEventListener('click', function($e){
            $e.preventDefault();
            form($element);
            })
        }

    </script>

@endsection

@section ('footer')

    <form method="post" action="{{ route('branch.list.pdf') }}" target="_blank">
        {{ csrf_field() }}

        <input type="hidden" id="branchCheckArray" name="branchCheckArray" data-js="branchCheckArray" value="">

        <div class=text-right>
            <a class="btn btn-primary" href="{{ route('branch.list.xls') }}" role="button" title="Exportar Excel.">Exportar Excel</a>
            <button class="btn btn-danger" type="submit" title="Exportar PDF.">Exportar PDF</button>
            <a class="btn btn-info" href="{{ route('dashboard') }}" role="button" title="Retornar à Dashboard.">Voltar</a>
        </div>
    </form>

    <script src="{{ url('assets/js/pdf.js') }}"></script>

@endsection