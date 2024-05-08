<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    
    <link href="<?= ICON_PATH?>css/fontawesome.css" rel="stylesheet">
    <link href="<?= ICON_PATH?>css/brands.css" rel="stylesheet">
    <link href="<?= ICON_PATH?>css/solid.css" rel="stylesheet">
    <link href="<?= CSS_PATH ?>fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= CSS_PATH ?>bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="<?= CSS_PATH?>style.css">
    <link rel="shortcut icon" href="<?= IMG_PATH?>webuild.ico">
    
    <script src="<?= JS_PATH?>jquery.js"></script>
    <script src="<?= JS_PATH?>plugins/piexif.min.js" type="text/javascript"></script>
    <script src="<?= JS_PATH?>plugins/sortable.min.js" type="text/javascript"></script>
    <script src="<?= JS_PATH?>plugins/purify.min.js" type="text/javascript"></script>
    <script src="<?= JS_PATH?>popper.js"></script>
    <script src="<?= JS_PATH?>bootstrap.js" type="text/javascript"></script>
    <script src="<?= JS_PATH?>fileinput.js"></script>
    <script src="assets/themes/fa/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.7/js/locales/(lang).js"></script>

    <!--<script type="text/javascript" src="js/script.js">
    </script>-->

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

</head>
<body>
    <nav class="navbar navbar-expand-lg  navbar-light bg-menu">
        <?php require_once VIEW_PATH . 'menu.php'; ?>
     </nav>
        <?php require_once VIEW_PATH . $view; ?>
    </div>
</body>
</html>