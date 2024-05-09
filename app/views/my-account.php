<?php

/**
 * auhor: helenilson Oliveira
 * data : 11/12/2019
 * 
 * Descrition: tela do perfil interno do usuario
 * 
 */

use app\controllers\Auth;

if (!Auth::authenticated()){
    header("Location: /");
    exit;
}
$token  = hash('sha512', rand(10, 100));
$_SESSION['token_perfil'] = $token;



?>


    <div class="container">
        <div class="row mt-4  ">
            <div class="col-md-4 d-flex flex-column ">
                <!--MENU-->
              
                <?php 
                      
                require_once(VIEW_PATH.'perfilMyaccount.php') ?>
                
                <!--FIM MENU-->
            </div>
            <div class="col-md-8 shadow ">
                <h2 class="borda p-2 m-3"> Perfil</h2>

                <?php if (isset($_GET['sucess'])) {
                    echo "<div class='alert alert-success' role='alert'>Atualizado Com sucesso!</div>";
                }
                if (isset($_GET['erro'])) {
                    echo "<div class='alert alert-danger' role='alert'>Erro ao atualizar!</div>";
                } ?>

                <span class="borda"></span>

                <!--Formulario cadastro-->
                <form method="POST" action="update_registro.php" class="p-4" autocomplete="off">

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" readonly class="input-form form-control" name="f_nome" id="nome"
                                value="<?= $nome ?>" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" readonly class="input-form form-control" name="f_sobrenome"
                                id="sobrenome" value=" <?= $sobrenome ?>" placeholder=" sobrenome">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="number" disabled class="form-control-plaintext input-form form-control"
                                name="f_cpf" id="cpf" value="<?= $CPF ?>" placeholder="CPF">
                            <small id="emailHelp" class="form-text text-muted">não pode ser editado.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="data_nascimento">Data nascimento</label>
                            <input type="text" readonly class="input-form form-control " id="data_nascimento"
                                name="data_nascimento" value="<?= $data_nascimento ?>" placeholder=" 01/04/2000">
                            <small id="emailHelp" class="form-text text-muted">Fomato da data ex:dia/mês/ano .</small>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="tel">Telefone</label>
                            <input type="tel" readonly class="input-form form-control" id="tel" name="f_tel"
                                value="<?= $TEL ?>" placeholder="tel">
                            <small id="emailHelp" class="form-text text-muted">Somente números.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cel">Celular</label>
                            <input type="tel" readonly class="input-form form-control" id="cel" name="f_cel"
                                value=" <?= $CEL ?>" placeholder="(DD)9999-9999">
                            <small id="emailHelp" class="form-text text-muted">Somente números.</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text" disabled class="input-form form-control" id="f_username" name="username"
                                value=" <?= $username ?>" placeholder=" Username">
                            <small id="emailHelp" class="form-text text-muted">não pode ser editado.</small>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" disabled class="input-form form-control" id="senhas" name="f_senha"
                                value=" <?= $senha ?>" placeholder=" Senha">
                            <small id="emailHelp" class="form-text text-muted">edita senha?.</small>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" readonly class="input-form form-control" id="email" name="f_email"
                            value=" <?= $email ?> " placeholder="email">

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


