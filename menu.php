<link href="icon/css/fontawesome.css" rel="stylesheet">
<link href="icon/css/brands.css" rel="stylesheet">
<link href="icon/css/solid.css" rel="stylesheet">
<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.7/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<script src="js/jquery.js"></script>
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you 
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="js/popper.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="js/bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<!-- the main fileinput plugin file -->
<script src="js/fileinput.js"></script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="themes/fa/theme.js"></script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.7/js/locales/(lang).js"></script>


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
        session_start();
        require_once('conexao.php');
        $id_usuario = $_SESSION['id_usuario'];
        $con = new Conexao();
        $link = $con->conecta();
        $sql_file = "SELECT img FROM tb_usuario WHERE id_usuario = $id_usuario";
        $resposta = mysqli_query($link, $sql_file);
        if ($r = mysqli_fetch_assoc($resposta)) {
            $img = $r['img'];
        }
        if (isset($r['img'])) {
            echo "";
            echo "<div class='img-resultado rounded-circle'>";
            echo "<img width='150' src='img/userid" . $id_usuario . "/" . $img . "' alt=''>";
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