<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Painel administrativo</title>
</head>

<body class="bg-menu">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center  " style="height:100vh;">
            <div class="col-md-5  ">
                <!-- definido a altura heigth 100vh o center-block funciona-->
                <form class="center-block" action="validar_usuario.php" method="POST">
                    <div class="d-flex justify-content-center">
                        <img src="../img/logo_webuild.png" alt="" width="250">
                    </div>

                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" class="form-control input-form" name="email" id="email" aria-describedby="emailHelp" placeholder=" email">
                        <small id="emailHelp" class="form-text text-muted">esqueceu seu email.</small>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control input-form" name="senha" id="senha" placeholder="Senha">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Continuar Logado</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input type="submit" class="btn bg-gradiente px-5 " value="Logar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>