@extends('templates.home')

@section('title')

    <h1>Funcionários / Listar</h1>

@endsection

@section('content')

    <div class="table-responsive">

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">CPF</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Função</th>
                    <th scope="col">Filial</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            @foreach($dataEmployee as $dataEmployee)
                @if ($dataEmployee -> status === 0)
                    <tr class="table-danger">
                @else
                    <tr>
                @endif
                    <td>{{ $dataEmployee -> cpf }}</td>
                    <td>{{ $dataEmployee -> full_name }}</td>
                    <td>{{ $dataEmployee -> function }}</td>
                    <td>{{ $dataEmployee -> id_branch }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ url("home/employee/edit/{$dataEmployee -> id}") }}" role="button" title="Editar"><i class="fas fa-edit"></i></a>
                        @if ($dataEmployee -> status === 0)
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
                                        Deseja ativar {{ $dataEmployee -> full_name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                        <a type="button" class="btn btn-primary" href="{{ url("/home/employee/edit/{$dataEmployee -> id}/active") }}">Sim</a>
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
                                        Deseja inativar {{ $dataEmployee -> full_name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                        <a type="button" class="btn btn-primary" href="{{ url("/home/employee/edit/{$dataEmployee -> id}/inactive") }}">Sim</a>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        @endif

                    </td>
                </tr>
            @endforeach

        </table>

        <a class="btn btn-info" href="/home" role="button" title="Retornar à Dashboard.">Voltar</a>

@endsection