@extends ('templates.list')

@section ('header')

    <h1 class="text-center">Listagem de Funcionários</h1>

@endsection

@section ('body')

    <!-- table -->
    <table class="table table-bordered table-hover text-center">

        <!-- header -->
        <thead class="thead-light">
            <!-- cols -->
            <tr>
                <!-- cpf -->
                <th scope="col">CPF</th>
                <!-- full_name -->
                <th scope="col">NOME</th>
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

                    <!-- cpf -->
                    <td> {{ $data -> cpf }} </td>

                    <!-- full_name -->
                    <td> {{ $data -> full_name }} </td>

                    <!-- function -->
                    <td> {{ $data -> function }} </td>

                    <!-- branch -->
                    <td> {{ $data -> id_branch }} </td>
                        
                    <!-- action buttons -->
                    <td>
                        <!-- edit -->
                        <a class="btn btn-primary btn-sm" href="#" role="button" title="Editar"><i class="fas fa-edit"></i></a>

                        <!-- status verification -->
                        @if ($data -> status === 0)

                            <!-- active -->
                            <a class="btn btn-success btn-sm" href="#" role="button" title="Ativar" data-toggle="modal" data-target="#activeEmployee"><i class="fas fa-check-circle"></i></a>

                        @else

                        <!-- inactive -->
                        <a class="btn btn-danger btn-sm" href="#" role="button" title="Inativar" data-toggle="modal" data-target="#inactiveEmployee"><i class="fas fa-ban"></i></a>

                        @endif

                        <!-- delete -->
                        <a class="btn btn-danger btn-sm" href="#" role="button" title="Remover" data-toggle="modal" data-target="#removeEmployee"><i class="fas fa-trash-alt"></i></a>
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