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
        <title>{{ $reportTitle }}</title>
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
                    <!-- social_name -->
                    <th class="text-left" width="300px">RAZÃO SOCIAL</th>
                    <!-- cnpj -->
                    <th>CNPJ</th>
                    <!-- ie -->
                    <th>IE</th>
                    <!-- city / state -->
                    <th>CIDADE / ESTADO</th>
                    <!-- status -->
                    <th>SITUAÇÃO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataBranch as $branch)
                    <tr>
                        <!-- social_name -->
                        <td class="text-left">{{ $branch -> social_name }}</td>
                        <!-- cnpj -->
                        <td>{{ $branch -> cnpj }}</td>
                        <!-- ie -->
                        <td>{{ $branch -> ie }}</td>
                        <!-- city / state -->
                        <td>{{ $branch -> city}} / {{ $branch -> state }}</td>
                        <!-- status -->
                        @if ($branch -> status === 0)
                            <td>Inativa</td>
                        @else
                            <td>Ativa</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table table-sm table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">DATA/HORA: {{ $dateNow }} - {{ $timeNow }}</th>
                    <th scope="col">USUÁRIO: {{ auth() -> guard('employee') -> user() -> full_name }}</th>
                </tr>
            </thead>
        </table>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>