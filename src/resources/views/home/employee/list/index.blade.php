@extends ('templates.list')

@section ('header')

    <h1 class="text-center">Listagem de Funcionários</h1>

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

    <!-- table -->
    <table class="table table-bordered table-hover text-center">

        <!-- header -->
        <thead class="thead-light align-middle">
            <!-- cols -->
            <tr>
                <!-- full_name -->
                <th scope="col" class="text-left">NOME</th>
                <!-- cpf -->
                <th scope="col">CPF</th>
                <!-- function -->
                <th scope="col">FUNÇÃO</th>
                <!-- branch -->
                <th scope="col">FILIAL</th>
                <!-- action buttons -->
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>

        <tbody>

            <!-- data loop -->
            @foreach ($dataEmployee as $data)

                <!-- rows -->
                    
                <!-- status verification -->
                @if ($data -> status === 0)

                    <tr  class="table-danger">

                @else

                    <tr>

                @endif

                    <!-- full_name -->
                    <td class="align-middle text-left"> {{ $data -> full_name }} </td>

                    <!-- cpf -->
                    <td class="align-middle"> {{ $data -> cpf }} </td>

                    <!-- function -->
                    <td class="align-middle"> {{ $data -> function }} </td>

                    <!-- branch -->

                    <td class="align-middle"> {{ $data -> branch -> social_name }} </td>
                        
                    <!-- action buttons -->
                    <td class="align-middle">
                        
                        <form action="" data-js="modal">
                            <!-- view -->
                            <a class="btn btn-info btn-sm" href="{{ url("/home/employee/view/{$data -> id}") }}" role="button" title="Visualizar"><i class="fas fa-eye"></i></a>
                            
                            <!-- edit -->
                            <a class="btn btn-primary btn-sm" href="{{ url("/home/employee/edit/{$data -> id}") }}" role="button" title="Editar"><i class="fas fa-edit"></i></a>

                            <!-- status verification -->
                            @if ($data -> status === 0)

                                <!-- active -->
                                <a class="btn btn-success btn-sm" data-js="active" href="{{ url("/home/employee/edit/{$data -> id}/active") }}" data-toggle="modal" data-target="#activeEmployee" role="button" title="Ativar"><i class="fas fa-check-circle"></i></a>

                            @else

                            <!-- inactive -->
                            <a class="btn btn-danger btn-sm" data-js="inactive" href="{{ url("/home/employee/edit/{$data -> id}/inactive") }}" data-toggle="modal" data-target="#inactiveEmployee" role="button" title="Inativar"><i class="fas fa-ban"></i></a>

                            @endif

                            <!-- delete -->
                            <a class="btn btn-danger btn-sm" data-js="remove" href="{{ url("/home/employee/edit/{$data -> id}/remove") }}" data-toggle="modal" data-target="#removeEmployee" role="button" title="Remover"><i class="fas fa-trash-alt"></i></a>
                        </form>

                    </td>

                </tr>

            @endforeach

        </tbody>
    
    </table>

    <!-- modals -->

    <!-- active modal -->
    <div class="modal fade" id="activeEmployee" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Informação!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <strong>DESEJA ATIVAR ESTE FUNCIONÁRIO?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a class="btn btn-info" role="button" data-js="activeYes" href="#">Sim</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- inactive modal -->
    <div class="modal fade" id="inactiveEmployee" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Informação!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <strong>DESEJA DESATIVAR ESTE FUNCIONÁRIO?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a class="btn btn-info" role="button" data-js="inactiveYes" href="#">Sim</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- remove modal -->
    <div class="modal fade" id="removeEmployee" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Informação!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <strong>DESEJA REMOVER ESTE FUNCIONÁRIO?</strong>
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

    <div class=text-right>
        <a class="btn btn-info" href="{{ route('dashboard') }}" role="button" title="Retornar à Dashboard.">Voltar</a>
    </div>

@endsection