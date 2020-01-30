@extends ('templates.list')

@section ('header')

    <h1 class="text-center">Listagem de Automóveis</h1>

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
        <thead class="thead-light">
            <!-- cols -->
            <tr>
                <!-- name -->
                <th scope="col" class="text-left">NOME</th>
                <!-- category -->
                <th scope="col">CATEGORIA</th>
                <!-- year -->
                <th scope="col">ANO</th>
                <!-- model -->
                <th scope="col">MODELO</th>
                <!-- color -->
                <th scope="col">COR</th>
                <!-- production branch -->
                <th scope="col">FILIAL</th>
                <!-- chassi -->
                <th scope="col">CHASSI</th>
                <!-- action buttons -->
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>

        <tbody>

            <!-- data loop -->
            @foreach ($dataCar as $data)

                <!-- rows -->
                <tr>

                    <!-- name -->
                    <td class="align-middle text-left"> {{ $data -> name }} </td>

                    <!-- category -->
                    <td class="align-middle"> {{ $data -> category }} </td>

                    <!-- year -->
                    <td class="align-middle"> {{ $data -> year }} </td>

                    <!-- model -->
                    <td class="align-middle"> {{ $data -> model }} </td>

                    <!-- color -->
                    <td class="align-middle"> {{ $data -> color }} </td>

                    <!-- production branch -->
                    @foreach ($dataBranch as $branch)

                        @if ($data -> id_branch === $branch -> id)
                            <td class="align-middle"> {{ $branch -> social_name }} </td>
                        @endif

                    @endforeach

                    <!-- chassi -->
                    <td class="align-middle"> {{ $data -> chassi }} </td>
                        
                    <!-- action buttons -->
                    <td>
                        <!-- view -->
                        <a class="btn btn-info btn-sm" href="{{ url("/home/car/view/{$data -> id}") }}" role="button" title="Vizualizar"><i class="fas fa-eye"></i></a>
                        
                        <!-- edit -->
                        <a class="btn btn-primary btn-sm" href="{{ url("/home/car/edit/{$data -> id}") }}" role="button" title="Editar"><i class="fas fa-edit"></i></a>

                        <!-- delete -->
                        <a class="btn btn-danger btn-sm" href="{{ url("/home/car/edit/{$data -> id}/remove") }}" role="button" title="Remover"><i class="fas fa-trash-alt"></i></a>
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
                    Deseja remover este automóvel?
                    <input type="hidden" id="id_car" name="id_car" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a type="button" class="btn btn-primary" href="{{ url("/home/car/edit/") }}">Sim</a>
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