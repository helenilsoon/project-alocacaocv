<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}

require_once('../conexao.php');

require_once('topo.php');



$con = new Conexao();
$link = $con->conecta();

$sql = "SELECT * FROM categoria_servico";
$resposta = mysqli_query($link, $sql);
if (!$resposta) {
    die("falha ao fazer a consulta");
}

?>
<div class="container">
    <div class="row mt-5  ">
        <div class="col-md-4 d-flex flex-column ">

            <?php require_once('menu-lateral.php'); ?>
        </div>
        <div class="col-md-8 ">
            <div>
                <ul class="list-group ">
                    <?php while ($res = mysqli_fetch_assoc($resposta)) { ?>
                        <li class="list-group-item"><?= $res['nome_categoria_servico'] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

</div>





<?php require_once('rodape.html'); ?>