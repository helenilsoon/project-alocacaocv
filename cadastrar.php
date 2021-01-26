<?php
session_start();


$erro_msg_campos_vazio = isset($_SESSION['erro_preencha_campos']) ? $_SESSION['erro_preencha_campos'] : "";
$erro_msg_user_no_exist = isset($_SESSION['erro_usuario_no_exist']) ? $_SESSION['erro_usuario_no_exist'] : "";
$token = hash('sha512', rand(100, 1000));
$_SESSION['token'] = $token;


$pg = "Cadastrar-se ";

    require_once("config/config.php");

    require_once("App/ControllerUser.php");

    $use = new ControllerUser();

    $lis = $use->getNome();

    require_once "topo.php";
    

?>
    <!--Conteudo principal-->
    <main>

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center  " style="height:100vh;">
                <div class="col-md-7">

                    <img src="img/ilustrao_cadastro.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-5  ">
                    <!-- definido a altura heigth 100vh o center-block funciona-->

                    <!--Inicio formulario-->

                    <form class="center-block" action="validar_cadastro.php" method="POST" id="formulario_cadastro">

                  
                        <div class="d-flex justify-content-center p-5">
                            <h3 class="text-orange">Cadastre-se </h3>
                        </div>

                        <div class="form-group">
                            <label for="nome">Nome </label>
                            <input type="text" class="form-control input-form" name="nome" id="nome" placeholder=" Nome"
                                required>

                        </div>
                        <div class="form-group">
                            <label for="username">Username * </label>
                            <input type="text" class="form-control input-form" name="username" id="username"
                                placeholder=" Username" required>

                            <div id="user_exist"></div>

                        </div>

                        <div class="form-group">
                            <label for="email">Email * </label>
                            <input type="email" class="form-control input-form" name="email" id="email"
                                placeholder=" seuemail@mail.com" required pattern="+@+">
                            <div id="email_exist"></div>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha *</label>
                            <input type="password" class="form-control input-form" name="senha" id="senha"
                                placeholder="*************" required>
                            <!--  <meter value="0" id="mtSenha" max="100"></meter>-->
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

                        <small class=" d-flex justify-content-end py-2 mr-3">Tem conta? <a href="login.php">login.</a>
                        </small>

                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn bg-gradiente text-ligth px-5 " name="form_btn_cadastrar"
                                value="Criar conta">
                        </div>
                    </form>
                </div>
            </div>
        </div>

 <script type="text/javascript">
    $(document).ready(function() {
        $('#username').blur(function(event) {

            if ($('#username').val().length > 0) {
                $.ajax({
                    url: 'function.php',
                    method: 'POST',
                    // data: $('#username').serialize(),
                    data: $('#username, #token').serialize(),

                    success: function(data) {
                        $('#user_exist').html(data);
                    }
                });
            }
        });
        $('#email').blur(function(event) {

            if ($('#email').val().length > 0) {

                $.ajax({
                    url: 'function.php',
                    method: 'POST',
                    data: $('#email,#token').serialize(),
                    success: function(data) {
                        $('#email_exist').html(data);
                    }

                });
            }
        });
    });
    </script>
