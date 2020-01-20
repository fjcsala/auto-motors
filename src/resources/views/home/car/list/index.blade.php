@extends('templates.home')

@section('title')

    <h1>Automóveis / Listar</h1>

@endsection

@section('content')

    <div class="table-responsive">

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Chassi</th>
                    <th scope="col">Montadora</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Filial de Produção</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dataCar as $dataCar)
                    <tr>
                        <td>{{ $dataCar -> chassi }}</td>
                        <td>{{ $dataCar -> name }}</td>
                        <td>{{ $dataCar -> model }}</td>
                        <td>{{ $dataCar -> category }}</td>
                        <td>{{ $dataCar -> year }}</td>
                        <td>{{ $dataCar -> color }}</td>
                        <td>{{ $dataCar -> id_branch }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ url("/home/car/edit/{$dataCar -> id}") }}" role="button" title="Editar"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <a class="btn btn-info" href="/home" role="button" title="Retornar à Dashboard.">Voltar</a>

    </div>

        <!-- active modal -->

    <div class="modal fade" id="deleteCar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Informação!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                    Deseja deletar este automóvel?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <button type="button" class="btn btn-primary">Sim</button>
            </div>
        </div>
    </div>

@endsection