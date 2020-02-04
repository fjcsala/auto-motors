<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Auto Motors</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/main.css') }}">
        <script src="https://pratikborsadiya.in/vali-admin/js/jquery-3.3.1.min.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/popper.min.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/bootstrap.min.js"></script>
    </head>
    <body>
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <!-- logo -->
            </div>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informação!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @foreach($errors -> all() as $error)
                                <strong>
                                    <li> {{ $error }} </li>
                                </strong>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            @if (isset($errors) && count($errors) > 0)
                <script>
                    $('#myModal').modal('show');
                </script>
            @endif

            <div class="login-box">
                <form class="login-form" action="{{ route('login.auth') }}" method="post">
                    {{ csrf_field() }}
                    <h3 class="login-head"><i class="fas fa-sign-in-alt"></i> Login</h3>
                    <div class="form-group">
                        <label class="control-label">CPF</label>
                        <input class="form-control" name="cpf" id="cpf" type="text" value="{{ old('cpf') }}" placeholder="Insira o seu CPF" data-mask="000.000.000-00" required autofocus>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Senha</label>
                        <input class="form-control" name="password" id="password" type="password" placeholder="Insira a sua senha" maxlength="8" required>
                    </div>
                    <!--
                    <div class="form-group">
                        <div class="utility">
                            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Esqueceu a sua senha?</a></p>
                        </div>
                    </div>
                    -->
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Entrar</button>
                    </div>
                </form>
                <!--
                <form class="forget-form" action="#">
                    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Redefinir Senha</h3>
                    <div class="form-group">
                        <label class="control-label">CPF</label>
                        <input class="form-control" type="text" placeholder="Insira o seu CPF">
                    </div>
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Redefinir</button>
                    </div>
                    <div class="form-group mt-3">
                        <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Página de Login</a></p>
                    </div>
                </form>
                -->
            </div>
        </section>
        <script src="https://kit.fontawesome.com/8f91a73427.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/main.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/plugins/pace.min.js"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
        <!--
        <script type="text/javascript">
            $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
            });
        </script>
        -->
    </body>
</html>