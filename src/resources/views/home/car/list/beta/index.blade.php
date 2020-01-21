@extends ('templates.list')

@section ('header')

    <h1 class="text-center">Listagem de Automóveis</h1>

@endsection

@section ('body')

    <!-- table -->
    <table class="table table-bordered table-hover text-center">

        <!-- header -->
        <thead class="thead-light">
            <!-- cols -->
            <tr>
                <!-- chassi -->
                <th scope="col">CHASSI</th>
                <!-- name/factory -->
                <th scope="col">MONTADORA</th>
                <!-- model -->
                <th scope="col">MODELO</th>
                <!-- category -->
                <th scope="col">CATEGORIA</th>
                <!-- year -->
                <th scope="col">ANO</th>
                <!-- color -->
                <th scope="col">COR</th>
                <!-- production branch -->
                <th scope="col">FILIAL DE PROD.</th>
                <!-- action buttons -->
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>

        <tbody>

            <!-- data loop -->
            @foreach ($dataCar as $data)

                <!-- rows -->
                <tr>

                    <!-- chassi -->
                    <td> {{ $data -> chassi }} </td>

                    <!-- name/factory -->
                    <td> {{ $data -> name }} </td>

                    <!-- model -->
                    <td> {{ $data -> model }} </td>

                    <!-- category -->
                    <td> {{ $data -> category }} </td>

                    <!-- year -->
                    <td> {{ $data -> year }} </td>

                    <!-- color -->
                    <td> {{ $data -> color }} </td>

                    <!-- production branch -->
                    <td> {{ $data -> id_branch }} </td>
                        
                    <!-- action buttons -->
                    <td>
                        <!-- edit -->
                        <a class="btn btn-primary btn-sm" href="#" role="button" title="Editar"><i class="fas fa-edit"></i></a>

                        <!-- delete -->
                        <a class="btn btn-danger btn-sm" href="#" role="button" title="Remover" data-toggle="modal" data-target="#removeCar"><i class="fas fa-trash-alt"></i></a>
                    </td>

                </tr>

            @endforeach

        </tbody>
    
    </table>

    <!-- modals -->
    
    <!-- remove modal -->
    <div class="modal fade" id="removeCar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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