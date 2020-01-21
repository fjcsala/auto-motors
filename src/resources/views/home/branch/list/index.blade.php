@extends('templates.home')

@section ('title')

    <h1 class="text-center">Filiais / Listar</h1>

@endsection

@section('content')

    <div class="table-responsive">

        <table class="table table-bordered table-hover">
            <thead class="thead-light text-center">
                <tr>
                <th scope="col">CNPJ</th>
                <th scope="col">IE</th>
                <th scope="col">RAZÃO SOCIAL</th>
                <th scope="col">CIDADE</th>
                <th scope="col">ESTADO</th>
                <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataDB as $dataDB)
                    @if ($dataDB -> status == 0)
                        <tr class="table-danger text-center">
                    @else
                        <tr class="text-center">
                    @endif
                        <td>{{ $dataDB -> cnpj }}</td>
                        <td>{{ $dataDB -> ie }}</td>
                        <td>{{ $dataDB -> social_name }}</td>
                        <td>{{ $dataDB -> city }}</td>
                        <td>{{ $dataDB -> state }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ url("home/branch/edit/{$dataDB -> id}") }}" role="button" title="Editar"><i class="fas fa-edit"></i></a>
                            @if ($dataDB -> status === 0)
                                <a class="btn btn-success btn-sm" href="#" title="Ativar" role="button" data-toggle="modal" data-target="#activeEmployee"><i class="fas fa-check-circle"></i></a>

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
                                            Deseja ativar {{ $dataDB -> social_name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                            <a type="button" class="btn btn-primary" href="{{ url("/home/branch/edit/{$dataDB -> id}/active") }}">Sim</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <a class="btn btn-danger btn-sm" href="#" title="Inativar" role="button" data-toggle="modal" data-target="#inactiveEmployee"><i class="fas fa-ban"></i></a>
                            
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
                                            Deseja inativar {{ $dataDB -> social_name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                            <a type="button" class="btn btn-primary" href="{{ url("/home/branch/edit/{$dataDB -> id}/inactive") }}">Sim</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            @endif

                            <a class="btn btn-danger btn-sm" href="#" role="button" title="Excluir" data-toggle="modal" data-target="#removeBranch"><i class="fas fa-trash-alt"></i></a>

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
                                            Deseja remover {{ $dataDB -> social_name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                            <a type="button" class="btn btn-primary" href="#">Sim</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a class="btn btn-info" href="/home" role="button" title="Retornar à Dashboard.">Voltar</a>

    </div>

@endsection