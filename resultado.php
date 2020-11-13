<?php
session_start();
$pagina = "resultado.php"; //aqui colocariamos o nome da pagina.

require_once 'conexao.php';

$nome = $_POST['pesquisa'];

$con = new Conexao();
$link = $con->conecta();

$sql = "SELECT u.nome,u.profissao, e.cep,e.rua,e.bairro FROM";
$sql .= " tb_usuario as u left join tb_endereco as e on(u.id_usuario = e.id_usuario)";
$sql .= " WHERE nome  LIKE '%{$nome}%'";
$sql .= " OR tb_profissao  LIKE '%{$nome}%'";
$sql .= " OR cep  LIKE '%{$nome}%'";
$sql .= " OR rua  LIKE '%{$nome}%' ";
$sql .= " OR bairro  LIKE '%{$nome}%'  ";

$res = mysqli_query($link, $sql);
if ($res) {
    $i = 0;
    while ($re = mysqli_fetch_assoc($res)) {

        $nome = $re['nome'];
        $profissao = $re['profissao'];

        ?>
<div class="row resultado ">


    <div class="col-4  py-3">
        <div class="d-flex justify-content-center ">
            <div class="img-resultado border rounded-circle">
                <img src="../img/img.JPG" class="img-fluid img py-3" alt="">
            </div>

            <!-- <i class="fa fa-user-circle">

                    </i>-->

        </div>
        <div class="d-flex justify-content-center">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>

    </div>
    <div class="col-8 py-3 ">
        <p>Nome: <?=$nome?></p>
        <p>Profissão: <?=$profissao?></p>

    </div>

</div>
<?php }
    echo "<small class='d-flex justify-content-center p-4'>" . $i . " resultados</small> ";
} else {
    echo "Erro na pesquisa";
}
?>