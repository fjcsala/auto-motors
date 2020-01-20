@extends('templates.dashboard')

@section ('content')

  <h1>Dashboard</h1>

@endsection

@section('cards')

    <div class="row">

        <div class="col-md-6 col-lg-4">
          <a class="nav-link" href="{{ url('/home/branch/list') }}">
            <div class="widget-small primary coloured-icon"><i class="icon fas fa-sitemap fa-3x"></i>
              <div class="info">
                <h4>Filiais</h4>
                <p><b>{{ $totalBranch }}</b></p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-4">
          <a class="nav-link" href="{{ url('/home/employee/list') }}">
            <div class="widget-small info coloured-icon"><i class="icon fas fa-users fa-3x"></i>
              <div class="info">
                <h4>Funcionários</h4>
                <p><b>{{ $totalEmployee }}</b></p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-4">
          <a class="nav-link" href="{{ url('/home/car/list') }}">
            <div class="widget-small warning coloured-icon"><i class="icon fas fa-car fa-3x"></i>
              <div class="info">
                <h4>Automóveis</h4>
                <p><b>{{ $totalCar }}</b></p>
              </div>
            </div>
          </a>
        </div>

    </div>

    <!--

    o atributo class="nav-link" na tag <a> remove os sublinhados dos links.

    -->

@endsection