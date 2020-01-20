<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Auto Motors</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://pratikborsadiya.in/vali-admin/css/main.css">
    </head>
    <body>
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <!-- logo -->
            </div>

            @if (isset($errors) && count($errors) > 0)
                @foreach ($errors -> all() as $error)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif

            <div class="login-box">
                <form class="login-form" action="{{ route('login.auth') }}" method="post">
                    {{ csrf_field() }}
                    <h3 class="login-head"><i class="fas fa-sign-in-alt"></i> Login</h3>
                    <div class="form-group">
                        <label class="control-label">CPF</label>
                        <input class="form-control" name="cpf" id="cpf" type="text" placeholder="Insira o seu CPF" required autofocus>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Senha</label>
                        <input class="form-control" name="password" id="password" type="password" placeholder="Insira a sua senha" required>
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
        <script src="https://pratikborsadiya.in/vali-admin/js/jquery-3.3.1.min.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/popper.min.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/bootstrap.min.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/main.js"></script>
        <script src="https://pratikborsadiya.in/vali-admin/js/plugins/pace.min.js"></script>
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