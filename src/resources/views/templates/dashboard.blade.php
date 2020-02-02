<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Auto Motors</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://pratikborsadiya.in/vali-admin/css/main.css">
    </head>
    <body class="app sidebar-mini">
        <header class="app-header">
            <a class="app-header__logo" href=""></a>

            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

            <ul class="app-nav">

                <li class="dropdown">
                    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fas fa-user-alt fa-lg"></i></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-lg"></i> Sair</a></li>
                    </ul>
                </li>
            </ul>
        </header>

        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <ul class="app-menu">
                <li><a class="app-menu__item" href="{{ url('/home') }}"><i class="app-menu__icon fas fa-chart-bar"></i><span class="app-menu__label">Dashboard</span></a></li>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Filiais</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="{{ url('/home/branch/register') }}"><i class="icon fas fa-plus"></i> Cadastrar</a></li>
                        <li><a class="treeview-item" href="{{ url('/home/branch/list') }}"><i class="icon fas fa-list"></i> Listar</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Funcionários</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="{{ url('/home/employee/register') }}"><i class="icon fas fa-plus"></i> Cadastrar</a></li>
                        <li><a class="treeview-item" href="{{ url('/home/employee/list') }}"><i class="icon fas fa-list"></i> Listar</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-car"></i><span class="app-menu__label">Automóveis</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="{{ url('/home/car/register') }}"><i class="icon fas fa-plus"></i> Cadastrar</a></li>
                        <li><a class="treeview-item" href="{{ url('/home/car/list') }}"><i class="icon fas fa-list"></i> Listar</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
        <main class="app-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @yield('cards')
                </div>
            </div>
        </main>
        <script src="https://kit.fontawesome.com/8f91a73427.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/jquery-3.3.1.min.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/popper.min.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/bootstrap.min.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/main.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/plugins/pace.min.js"></script>

        <!-- modals -->

        <!-- logout modal -->

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informação!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <strong>
                            DESEJA SAIR DO SISTEMA?
                        </strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <a class="btn btn-info" href="{{ route('logout') }}" role="button">Sim</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>