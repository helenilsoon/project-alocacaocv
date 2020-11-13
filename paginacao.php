<?php

require_once('conexao.php');

$con = new Conexao();
$con  = $con->conecta();

$busca = "SELECT * FROM tb_usuario where nome LIKE '%e%'";

$total_reg = "10"; // número de registros por página

$pagina = $_GET['pagina'];
if (!$pagina) {
    $pc = "1";
} else {
    $pc = $pagina;
}

$inicio = $pc - 1;
echo $inicio . "<br>";
$inicio = $inicio * $total_reg;
echo $inicio . "<br>";

$sql = "$busca LIMIT $inicio,$total_reg";
$limite = mysqli_query($con, $sql);
$todos = mysqli_query($con, $busca);

$tr = mysqli_num_rows($todos); // verifica o número total de registros
$tp = $tr / $total_reg; // verifica o número total de páginas

// vamos criar a visualização
while ($dados = mysqli_fetch_array($limite)) {
    $nome = $dados["nome"];
    echo "Nome: $nome<br>";
}

// agora vamos criar os botões "Anterior e próximo"
$anterior = $pc - 1;
$proximo = $pc + 1;
if ($pc > 1) {
    echo " <a href='?pagina=$anterior'><- Anterior</a> ";
}
echo "|";
if ($pc < $tp) {
    echo " <a href='?pagina=$proximo'>Próxima -></a>";
}

$total_paginas = ceil($tp / $total_reg);
echo "Página " . $pc . " de $tp ";
echo "<br />";
$pagina_atual = $pc;
for ($i = 1; $i <= $total_paginas; $i++) {
    $classe_botao = $pagina_atual == $i ? 'btn-primary' : 'btn-default';
    echo "<button><a href='?pagina=" . $i . "' class='btn " . $classe_botao . " paginar' data-pagina_clicada=' " . $i . " '> " . $i . "</a> </button>";
}