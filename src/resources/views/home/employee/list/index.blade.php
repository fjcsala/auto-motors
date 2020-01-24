@extends ('templates.list')

@section ('header')

    <h1 class="text-center">Listagem de Funcionários</h1>

@endsection

@section ('body')

    @if (session('message'))
        <div class="alert alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong class="align-middle">{{ session('message') }}</strong>
        </div>
    @endif

    <!-- table -->
    <table class="table table-bordered table-hover text-center">

        <!-- header -->
        <thead class="thead-light">
            <!-- cols -->
            <tr>
                <!-- full_name -->
                <th scope="col">NOME</th>
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
                    @foreach ($dataBranch as $branch)

                        @if ($data -> id_branch === $branch -> id)
                            <td class="align-middle"> {{ $branch -> social_name }} </td>
                        @endif

                    @endforeach
                        
                    <!-- action buttons -->
                    <td class="align-middle">
                        <!-- view -->
                        <a class="btn btn-info btn-sm" href="{{ url("/home/employee/view/{$data -> id}") }}" role="button" title="Visualizar"><i class="fas fa-eye"></i></a>
                        
                        <!-- edit -->
                        <a class="btn btn-primary btn-sm" href="{{ url("/home/employee/edit/{$data -> id}") }}" role="button" title="Editar"><i class="fas fa-edit"></i></a>

                        <!-- status verification -->
                        @if ($data -> status === 0)

                            <!-- active -->
                            <a class="btn btn-success btn-sm" href="{{ url("/home/employee/edit/{$data -> id}/active") }}" role="button" title="Ativar"><i class="fas fa-check-circle"></i></a>

                        @else

                        <!-- inactive -->
                        <a class="btn btn-danger btn-sm" href="{{ url("/home/employee/edit/{$data -> id}/inactive") }}" role="button" title="Inativar"><i class="fas fa-ban"></i></a>

                        @endif

                        <!-- delete -->
                        <a class="btn btn-danger btn-sm" href="{{ url("/home/employee/edit/{$data -> id}/remove") }}" role="button" title="Remover"><i class="fas fa-trash-alt"></i></a>
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
                <div class="modal-body">
                    Deseja ativar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a type="button" class="btn btn-primary" href="#">Sim</a>
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
                <div class="modal-body">
                    Deseja inativar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a type="button" class="btn btn-primary" href="#">Sim</a>
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
                <div class="modal-body">
                    Deseja remover?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a type="button" class="btn btn-primary" href="#">Sim</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('footer')

    <div class=text-right>
        <a class="btn btn-info" href="{{ route('dashboard') }}" role="button" title="Retornar à Dashboard.">Voltar</a>
    </div>

@endsection