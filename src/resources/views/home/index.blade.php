@extends('templates.dashboard')

@section ('content')

  <h1>Dashboard</h1>

@endsection

@section('cards')

  <div class="row">
  
    <div class="col-md-4">
      <div class="widget-small primary"><i class="icon fa fa-sitemap fa-3x"></i>
        <div class="info">
          <h4>FILIAIS</h4>
          <p><b>{{ $totalBranch }}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small info"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>FUNCIONÁRIOS</h4>
          <p><b>{{ $totalEmployee }}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small danger"><i class="icon fa fa-car fa-3x"></i>
        <div class="info">
          <h4>AUTOMÓVEIS</h4>
          <p><b>{{ $totalCar }}</b></p>
        </div>
      </div>
    </div>
  </div>

    <!--

    o atributo class="nav-link" na tag <a> remove os sublinhados dos links.

    -->

@endsection