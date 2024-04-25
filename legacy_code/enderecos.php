<?php
/**
 * auhor: helenilson Oliveira
 * data : 15/12/2019
 * 
 * Descrition: Tela de login
 * 
 */

session_start();
 Error_reporting (0);
require_once('conexao.php');
if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
} else {
    $nome_usuario = $_SESSION['nome'];
    $id_usuario = $_SESSION['id_usuario'];
}
$token  = hash('sha512', rand(10, 100));
$_SESSION['token_endereco'] = $token;

// conectando ao banco de dados
$con = new Conexao();
$link = $con->conecta();

$sql = "SELECT * FROM tb_endereco where id_usuario = '$id_usuario'";

if ($res = mysqli_query($link, $sql)) {
    $resp = mysqli_fetch_assoc($res);

    $cep = $resp['cep'];
    $rua = $resp['rua'];
    $bairro = $resp['bairro'];
    $municipio = $resp['municipio'];
    $estado = $resp['estado'];
    $uf  = $resp['uf'];
}

//obtendo endereços


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Painel administrativo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script>
    $(document).ready(function() {
        $("#btnEditar").click(function() {

            $('input').removeAttr("readonly");
            $('select').removeAttr("disabled");
        });

    })
    </script>

</head>

<body>
    <?php require_once('topo.php'); ?>
    <div class="container">
        <div class="row mt-5  ">
            <div class="col-md-4 d-flex flex-column ">

                <?php require_once('menu.php') ?>
            </div>
            <div class="col-md-8 shadow">


                <h2 class="borda p-2 m-3">Endereços</h2>
                <?php if (isset($_GET['sucess'])) {
                    echo "<div class='alert alert-success' role='alert'>Atualizado Com sucesso!</div>";
                } ?>

                <span class="borda"></span>

                <!--formulario endereços -->
                <form action="update_registro.php" method="POST" class="p-4">
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="cep">CEP</label>
                            <input type="text" readonly class="input-form form-control" name="cep" id="cep"
                                value="<?= $cep ?>" placeholder="CEP">
                            <small id="emailHelp" class="form-text text-muted">somente números.</small>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-10">
                            <label for="rua">Rua</label>
                            <input type="text" readonly class="  input-form form-control" name="rua" id="rua"
                                value="<?= $rua ?>" placeholder="Rua">

                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label for="bairro">Bairro</label>
                                <input type="text" readonly class="form-control-plaintext input-form form-control"
                                    name="bairro" id="bairro" value="<?= $bairro ?>" placeholder="Bairro">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="municipio">Municipio</label>
                                <input type="text" readonly class="input-form form-control " name="municipio"
                                    name="estado" id="municipio" value="<?= $municipio ?>" placeholder=" Municipio">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="estado">Estado</label>
                                <select name="estado" disabled>
                                    <?php
                                    echo "<option value='" . $estado . "'>" . $estado . "</option>";

                                    if (isset($estado)) {

                                        //consulta a tabela estados

                                        $sqlEstados = "SELECT * FROM tb_estados";

                                        $estados = mysqli_query($link, $sqlEstados);
                                        while ($estado = mysqli_fetch_assoc($estados)) {
                                            $uf = $estado['uf'];
                                            $nome = $estado['nome'];
                                            echo "<option value='" . $uf . "'>" . $nome . "</option>";
                                        }
                                    } ?>

                                </select>

                            </div>
                        </div>
                        <input type="hidden" value="<?= $_SESSION['token_endereco'] ?>" name="token_endereco">

                        <div class=" col-12 d-flex justify-content-end py-5">
                            <a class="btn rounded-pill w-25 mb-4  ml-3 btn-orange" href="#" id="btnEditar"> Editar</a>
                            <input type="submit" class="btn rounded-pill w-25 mb-4 ml-3 btn-orange" value="Salvar">
                        </div>

                </form>
                <!--fim formulario -->


            </div>
        </div>
    </div>



    <?php require_once('rodape.php'); ?>