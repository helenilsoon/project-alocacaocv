<?php
/**
 * auhor: helenilson Oliveira
 * data : 08/12/2019
 *
 * Descrition: Tela de login
 *
 */

session_start();
$erro_msg_campos_vazio = isset($_SESSION['erro_preencha_campos']) ? $_SESSION['erro_preencha_campos'] : "";
$erro_msg_user_no_exist = isset($_SESSION['erro_usuario_no_exist']) ? $_SESSION['erro_usuario_no_exist'] : "";
$erro_msg_precisa_login = isset($_SESSION['erro_msg_precisa_login']) ? $_SESSION['erro_msg_precisa_login'] : "";
$token = hash('sha512', rand(100, 1000));
$_SESSION['token'] = $token;

$pg = "Entrar";

    //Menu da pagina--
    require_once "topo.php";

        if ($erro_msg_precisa_login != "") {

            echo $erro_msg_precisa_login;
        }
 ?>

    <!--Conteudo principal-->
    <main>

        <!--
        quando coloca o formulario action=validarlogin.php
    -->
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center  " style="height:100vh;">
                <div class="col-md-7">

                    <img src="img/ilustracao-login.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-5  ">
                    <!-- definido a altura heigth 100vh o center-block funciona-->
                    <form class="center-block" action="validar_usuario.php" method="POST">
                        <h3 class="txt-cinza text-center">Bem vindo de volta</h3>
                        <div class="d-flex justify-content-center p-3">

                            <h3 class="text-orange">Entrar</h3>
                        </div>

                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" class="form-control input-form" name="email" id="email"
                                placeholder=" mail@example.com" pattern="+@+">
                            <small id="emailHelp" class="form-text text-muted">esqueceu seu email.</small>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control input-form" name="senha" id="senha"
                                placeholder="Senha">
                            <input type="hidden" value="<?=$_SESSION['token']?>" name="token" id="token">
                        </div>

                        <?php
                            if ($erro_msg_user_no_exist != "") {
                                echo "<div class='alert alert-danger my-2' role='alert'> <small>";
                                echo $erro_msg_user_no_exist;

                                echo "</smal></div>";
                                unset($_SESSION['erro_usuario_no_exist']);
                            }
                            if ($erro_msg_campos_vazio != "") {

                                echo "<div class='alert alert-danger my-2' role='alert'> <small>";
                                echo $erro_msg_campos_vazio;

                                echo "</smal></div>";
                                unset($_SESSION['erro_preencha_campos']);
                            }
                        ?>


                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Continuar Logado</label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn bg-gradiente px-5 " name="form_btn_login" value="Entrar">
                        </div>
                    </form>
                    <small class=" d-flex justify-content-center py-2 mr-3"> <a href="cadastrar.php"> Cadastrar-se.</a>
                    </small>
                    <hr>

                </div>


            </div>
    </main>

    <!--rodape-->
 
        <?php require_once "rodape.php";?>

   


