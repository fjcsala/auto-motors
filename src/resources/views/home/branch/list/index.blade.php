@extends ('templates.list')

@section ('header')

    <h1 class="text-center">Listagem de Filiais</h1>

@endsection

@section ('body')

    <!-- table -->
    <table class="table table-bordered table-hover text-center">

        <!-- header -->
        <thead class="thead-light">
            <!-- cols -->
            <tr>
                <!-- cnpj -->
                <th scope="col">CNPJ</th>
                <!-- ie -->
                <th scope="col">IE</th>
                <!-- social_name -->
                <th scope="col">RAZÃO SOCIAL</th>
                <!-- city -->
                <th scope="col">CIDADE</th>
                <!-- state -->
                <th scope="col">ESTADO</th>
                <!-- action buttons -->
                <th scope="col">AÇÕES</th>
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

                    <!-- cnpj -->
                    <td> {{ $data -> cnpj }} </td>

                    <!-- ie -->
                    <td> {{ $data -> ie }} </td>

                    <!-- social_name -->
                    <td> {{ $data -> social_name }} </td>

                    <!-- city -->
                    <td> {{ $data -> city }} </td>

                    <!-- state -->
                    <td> {{ $data -> state }} </td>
                        
                    <!-- action buttons -->
                    <td>
                        <!-- view -->
                        <a class="btn btn-info btn-sm" href="{{ url("/home/branch/view/{$data -> id}") }}" role="button" title="Visualizar"><i class="fas fa-eye"></i></a>
                        
                        <!-- edit -->
                        <a class="btn btn-primary btn-sm" href="#" role="button" title="Editar"><i class="fas fa-edit"></i></a>

                        <!-- status verification -->
                        @if ($data -> status === 0)

                            <!-- active -->
                            <a class="btn btn-success btn-sm" href="#" role="button" title="Ativar" data-toggle="modal" data-target="#activeBranch"><i class="fas fa-check-circle"></i></a>

                        @else

                        <!-- inactive -->
                        <a class="btn btn-danger btn-sm" href="#" role="button" title="Inativar" data-toggle="modal" data-target="#inactiveBranch"><i class="fas fa-ban"></i></a>

                        @endif

                        <!-- delete -->
                        <a class="btn btn-danger btn-sm" href="#" role="button" title="Remover" data-toggle="modal" data-target="#removeBranch"><i class="fas fa-trash-alt"></i></a>
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
    <div class="modal fade" id="inactiveBranch" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    <div class="modal fade" id="removeBranch" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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