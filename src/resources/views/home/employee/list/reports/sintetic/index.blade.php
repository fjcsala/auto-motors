<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
            body {
                font-size: 10;
            }
        </style>
        <title> {{ $reportTitle }} </title>
    </head>
    <body>
        <!-- tables -->
        <table class="table table-sm table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">AUTO MOTORS S/A</th>
                </tr>
            </thead>
        </table>

        <table class="table table-sm table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">{{ $reportTitle }}</th>
                </tr>
            </thead>
        </table>

        <table class="table table-sm table-bordered text-center">
            <thead>
                <tr>
                    <!-- name -->
                    <th class="text-left">NOME</th>
                    <!-- cpf -->
                    <th>CPF</th>
                    <!-- function -->
                    <th>FUNÇÃO</th>
                    <!-- branch -->
                    <th>FILIAL</th>
                    <!-- status -->
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataEmployee as $employee)
                    <tr>
                        <!-- name -->
                        <td class="text-left">{{ $employee -> full_name }}</td>
                        <!-- cpf -->
                        <td>{{ $employee -> cpf }}</td>
                        <!-- function -->
                        <td>{{ $employee -> function }}</td>
                        <!-- branch -->
                        <td>{{ $employee -> branch -> social_name }}</td>
                        <!-- status -->
                        @if ($employee -> status === 0)
                            <td>Inativo</td>
                        @else
                            <td>Ativo</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table table-sm table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">DATA: {{ $dateNow }}</th>
                    <th scope="col">HORA: {{ $timeNow }}</th>
                    <th scope="col" class="text-uppercase">USUÁRIO: {{ auth() -> guard('employee') -> user() -> full_name }}</th>
                </tr>
            </thead>
        </table>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>