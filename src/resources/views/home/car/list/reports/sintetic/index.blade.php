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
                    <!-- name -->
                    <th class="text-left">NOME</th>
                    <!-- category -->
                    <th>CATEGORIA</th>
                    <!-- year -->
                    <th>ANO</th>
                    <!-- color -->
                    <th>MODELO</th>
                    <!-- branch -->
                    <th>COR</th>
                    <!-- branch -->
                    <th width="300px">FILIAL</th>
                    <!-- chassi -->
                    <th>CHASSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataCar as $car)
                    <tr>
                        <!-- name -->
                        <td class="text-left">{{ $car -> name }}</td>
                        <!-- category -->
                        <td>{{ $car -> category }}</td>
                        <!-- year -->
                        <td>{{ $car -> year }}</td>
                        <!-- model -->
                        <td>{{ $car -> model}}</td>
                        <!-- color -->
                        <td>{{ $car -> color }}</td>
                        <!-- branch -->
                        <td>{{ $car -> branch -> social_name }}</td>
                        <!-- chassi -->
                        <td>{{ $car -> chassi }}</td>
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