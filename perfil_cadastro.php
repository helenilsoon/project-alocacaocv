
<?php
session_start();
require_once('conexao.php');
 Error_reporting (0);
if (isset($_SESSION['user_key'])) {
    $user = $_SESSION['user_key'];
    $nome_usuario = $_SESSION['nome'];
    $id_usuario = $_SESSION['id_usuario'];
} else {
    header('Location: index.php');
}

$token  = hash('sha512', rand(10, 100));
$_SESSION['token_perfil'] = $token;

// conectando ao banco de dados
$con = new Conexao();
$link = $con->conecta();

$sql = "SELECT * FROM usuario where id_usuario =$id_usuario";

if ($res = mysqli_query($link, $sql)) {
    $resp = mysqli_fetch_assoc($res);
    $sobrenome = $resp['sobrenome'];
    $data_nascimento = $resp['data_nascimento'];
    $username = $resp['username'];
    $email = $resp['email'];
    $telefone = $resp['telefone'];
    $senha = $resp['password'];
    $profissao = $resp['profissao'];
    $cpf = $resp['CPF'];
    $tel = $resp['TEL'];
    $cel = $resp['CEL'];
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Perfil</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnEditar").click(function() {

                $('input').removeAttr("readonly");

            });

        })
    </script>

</head>

<body>
    <?php require_once('topo.php'); ?>
    <div class="container">
        <div class="row mt-4  ">
            <div class="col-md-4 d-flex flex-column ">
                <!--MENU-->

                <?php require_once('menu.php') ?>
                <!--FIM MENU-->
            </div>
            <div class="col-md-8 shadow ">
                <h2 class="borda p-2 m-3"> Perfil</h2>

                <?php if (isset($_GET['sucess'])) {
                    echo "<div class='alert alert-success' role='alert'>Atualizado Com sucesso!</div>";
                }
                if (isset($_GET['error'])) {
                    echo "<div class='alert alert-danger' role='alert'>Erro ao atualizar!</div>";
                } ?>

                <span class="borda"></span>

                <!--Formulario cadastro-->
                <form method="POST" action="update_registro.php" class="p-4" autocomplete="off" >

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" readonly class="input-form form-control" name="f_nome" id="nome" value="<?= $nome_usuario ?>" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" readonly class="input-form form-control" name="f_sobrenome" id="sobrenome" value=" <?= $sobrenome ?>" placeholder=" sobrenome">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="number" disabled class="form-control-plaintext input-form form-control" name="f_cpf" id="cpf" value="<?php echo $cpf; ?>" placeholder="CPF">
                            <small id="emailHelp" class="form-text text-muted">não pode ser editado.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="data_nascimento">Data nascimento</label>
                            <input type="text" readonly class="input-form form-control " id="data_nascimento" name="data_nascimento" value=" <?= $data_nascimento ?>" placeholder=" Ano-mês-dia">
                            <small id="emailHelp" class="form-text text-muted">Fomato da data ex:1991-12-05 .</small>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="tel">Telefone</label>
                            <input type="tel" readonly class="input-form form-control" id="tel" name="f_tel" value="<?= $tel ?>" placeholder="tel">
                            <small id="emailHelp" class="form-text text-muted">Somente números.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cel">Celular</label>
                            <input type="tel" readonly class="input-form form-control" id="cel" name="f_cel" value=" <?= $cel ?>" placeholder="(DD)9999-9999">
                            <small id="emailHelp" class="form-text text-muted">Somente números.</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text" disabled class="input-form form-control" id="f_username" name="username" value=" <?= $username ?>" placeholder=" Username">
                            <small id="emailHelp" class="form-text text-muted">não pode ser editado.</small>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" disabled class="input-form form-control" id="senhas" name="f_senha" value=" <?= $senha ?>" placeholder=" Senha">
                            <small id="emailHelp" class="form-text text-muted">edita senha?.</small>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" readonly class="input-form form-control" id="email" name="f_email" value=" <?= $email ?> " placeholder="email">

                    </div>
                    <input type="hidden" value="<?= $_SESSION['token_perfil'] ?>" name="token_perfil">


                    <div class="d-flex justify-content-end py-5">
                        <a class="btn rounded-pill w-25 mb-4  ml-3 btn-orange" id="btnEditar"> Editar</a>
                        <button class="btn rounded-pill w-25 mb-4 ml-3 btn-orange">Salvar</button>
                    </div>
                </form>
                <!--fim formulario -->

            </div><!-- div col-md-8-->
        </div><!-- div row-->

    </div><!-- div container-->



    <?php require_once('rodape.php'); ?>


    <script src="js/jquery.js">
    </script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>