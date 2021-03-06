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
        <thead class="thead-light align-middle">
            <!-- cols -->
            <tr>
                <!-- check -->
                <th scope="col"></th>
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
                <th scope="col" width="130px">AÇÕES</th>
            </tr>
        </thead>

        <tbody>

            <!-- data loop -->
            @foreach ($dataCar as $data)

                <!-- rows -->
                <tr>
                    <!-- check -->
                    <td class="align-middle"><input type="checkbox" id="branchCheck" name="branchCheck" data-js="branchCheck" value="{{ $data -> id }}"></td>
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
                    <td class="align-middle"> {{ $data -> branch -> social_name }} </td>
                    <!-- chassi -->
                    <td class="align-middle"> {{ $data -> chassi }} </td>
                    <!-- action buttons -->
                    <td>
                        <form action="" data-js="modal">
                            <!-- view -->
                            <a class="btn btn-info btn-sm" href="{{ url("/home/car/view/{$data -> id}") }}" role="button" title="Vizualizar"><i class="fas fa-eye"></i></a>
                            <!-- edit -->
                            <a class="btn btn-primary btn-sm" href="{{ url("/home/car/edit/{$data -> id}") }}" role="button" title="Editar"><i class="fas fa-edit"></i></a>
                            <!-- delete -->
                            <a class="btn btn-danger btn-sm" data-js="remove" href="{{ url("/home/car/edit/{$data -> id}/remove") }}" data-toggle="modal" data-target="#removeCar" role="button" title="Remover"><i class="fas fa-trash-alt"></i></a>
                        </form>
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
                <div class="modal-body text-center">
                    <strong>DESEJA REMOVER ESTE AUTOMÓVEL?</strong>
                    <input type="hidden" id="id_car" name="id_car" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a class="btn btn-info" role="button" data-js="removeYes" href="#">Sim</a>
                </div>
            </div>
        </div>
    </div>

    <script>

        $remove = document.querySelectorAll('[data-js="remove"]');
        $removeYes = document.querySelector('[data-js="removeYes"]');

        Array.prototype.forEach.call($remove, function($element, $index, $array)
        {
            $element.addEventListener('click', function($e)
            {
                $e.preventDefault();
                remove ($element);
            });
        })

        function form ($element)
        {
            var $form = document.querySelector('[data-js="modal"]');
            $form.action = $element.href;
            $form.submit();
        }

        function remove ($element)
        {
            var $removeYes = document.querySelector('[data-js="removeYes"]');

            $removeYes.addEventListener('click', function($e){
            $e.preventDefault();
            form($element);
            })
        }

    </script>

@endsection

@section ('footer')

    <form method="post" action="{{ route('car.list.pdf') }}" target="_blank">
        {{ csrf_field() }}
        <input type="hidden" id="branchCheckArray" name="branchCheckArray" data-js="branchCheckArray" value="">
        <div class=text-right>
            <a class="btn btn-primary" href="{{ route('car.list.xls') }}" role="button" title="Exportar Excel.">Exportar Excel</a>
            <button class="btn btn-danger" type="submit" title="Exportar PDF.">Exportar PDF</button>
            <a class="btn btn-info" href="{{ route('dashboard') }}" role="button" title="Retornar à Dashboard.">Voltar</a>
        </div>
    </form>

    <script src="{{ url('assets/js/pdf.js') }}"></script>

@endsection