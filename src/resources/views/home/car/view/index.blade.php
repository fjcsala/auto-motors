@extends ('templates.view')

@section ('header')

    <h1 class="text-center">Vizualizar Automóvel</h1>

@endsection

@section ('body')

    <form>

        <div class="row">

            <!-- chassi -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Chassi</label>
                    <input class="form-control" id="chassi" name="chassi" type="text"  value="{{ $dataCar -> chassi }}" disabled>
                </div>
            </div>

            <!-- category -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Categoria</label>
                    <input class="form-control" id="category" name="category" type="text" value="{{ $dataCar -> category }}" disabled>
                </div>
            </div>

            <!-- name/factory -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ $dataCar -> name }}" disabled>
                </div>
            </div>

        </div>

        <div class="row">

            <!-- year -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Ano</label>
                    <input class="form-control" id="year" name="year" type="text"  value="{{ $dataCar -> year }}" disabled>
                </div>
            </div>

            <!-- model -->
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Modelo</label>
                    <input class="form-control" id="model" name="model" type="text" value="{{ $dataCar -> model }}" disabled>
                </div>
            </div>

            <!-- color -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Cor</label>
                    <input class="form-control" id="color" name="color" type="text"  value="{{ $dataCar -> color }}" disabled>
                </div>
            </div>

            <!-- branch -->
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Filial</label>
                    @foreach ($dataBranch as $branch)

                        @if ($dataCar -> id_branch === $branch -> id)
                        <input class="form-control" id="branch" name="branch" type="text" value="{{ $branch -> social_name }}" disabled>
                        @endif

                    @endforeach
                    </div>
            </div>
        </div>

@endsection

@section ('footer')

    <div class=text-right>
        <a class="btn btn-primary" href="{{ url("/home/car/edit/{$dataCar -> id}") }}" role="button" title="Editar Informações.">Editar</a>
        <a class="btn btn-info" href="{{ route('car.list') }}" role="button" title="Retornar à Listagem.">Voltar</a>
    </div>

@endsection