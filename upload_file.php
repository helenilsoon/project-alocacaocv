<?php
session_start();
require_once('conexao.php');


if (isset($_SESSION['user_key'])) {

    $user = $_SESSION['user_key'];
    $nome_usuario = $_SESSION['nome'];
    $id_usuario = $_SESSION['id_usuario'];


    $file = isset($_FILES['file']) ? $_FILES['file'] : "";


    $extensao = strtolower(substr($_FILES["file"]["name"], -4));

    $novo_nome = strtolower($id_usuario) . md5(time()) . $extensao;

    if (file_exists('img/userid' . $id_usuario . '/')) {

        //rmdir('img/userid' . $id_usuario . '/');
        echo "Diretorio ja criado";
    } else {

        $criar = mkdir('img/userid' . $id_usuario . '', 0776, true);

	$php = "<php header('Location: /');?>"; 
	$fileIndex = fopen("index.php","w");
	fwrite($fileIndex,$php );
	fclose($fileIndex);	   
 }
    $diretorio = 'img/userid' . $id_usuario . '/';

    $_UP['pasta'] = $diretorio;

    move_uploaded_file($_FILES['file']['tmp_name'], $diretorio . $novo_nome);

    $con = new Conexao();
    $link = $con->conecta();
    // limpado a string e colocando uma conta barra


    $sql_iserir = "UPDATE tb_usuario set img='$novo_nome' where id_usuario = '$id_usuario'";
    echo "<br> sql = " . $sql_iserir;

    $res = mysqli_query($link, $sql_iserir);


    if ($res) {
        echo "atualizado com sucesso";
        header('location: perfil_user.php');
    } else {
        echo "Erro ao cadastrar entre em contato com o administrador";
    }
} else {
    $_SESSION['erro_preencha_campos'] = "Preenchas todos os campos";
    header('location: cadastrar.php');
}
