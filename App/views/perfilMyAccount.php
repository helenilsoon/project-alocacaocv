

<link rel="stylesheet" type="text/css" href="css/style.css">
<script>
$(document).ready(function() {

    $('#btn-file').click(function(event) {

        $('#modal').css("visibility", "visible");
    });

    $("#input-id").fileinput();

    // with plugin options
    $("#input-id").fileinput({
        'showUpload': false,
        'previewFileType': 'any',

    });

});
</script>


<div class="container border d-flex flex-column  mb-4 p-3 shadow">
    <div class=" d-flex justify-content-center">

        <?php
        $id_usuario = isset($_SESSION['user']['id_usuario'])? $_SESSION['user']['id_usuario'] :'';
        
        
        if (isset($img)) {
            echo "";
            echo "<div class='img-resultado rounded-circle'>";
            echo "<img width='150' src='".IMG_PATH.'userid'. $id_usuario . "/" . $img . "' alt=''>";
            echo "</div>";
        } else {
            echo "<img width='150' src='img/solid/user-circle.svg' alt=''>";
        }

        ?>

    </div>
    <button class="btn-sm w-50 text-white px-4 py-2 mx-auto my-2 rounded-pill btn-orange " data-toggle="modal"
        data-target="#upload-file"> file </button>

</div>
<div class="border shadow">
    <ul class="nav flex-column p-2 ">
        <li class="nav-item ">
            <a class="rounded-pill w-75  nav-link " href="perfil_user.php">Perfil</a>
        </li>
        <li class="nav-item">
            <a class="rounded-pill w-75  nav-link" href="enderecos.php">Endereços</a>
        </li>
        <li class="nav-item">
            <a class="rounded-pill w-75  nav-link" href="#">Serviços</a>
        </li>
        <li class="nav-item">
            <a class="rounded-pill w-75  nav-link " href="#">Configurações</a>
        </li>
    </ul>
</div>

<!--modal-->


<div class="modal fade" id="upload-file" tabindex="-1" role="dialog" aria-labelledby="upload_file" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selecione a imagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="upload_file.php" enctype="multipart/form-data">

                    <input id="input-id" type="file" class="file" name="file" data-preview-file-type="text">
                </form>
            </div>

        </div>
    </div>
</div>