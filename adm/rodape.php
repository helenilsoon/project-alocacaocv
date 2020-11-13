<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}
?>

<script src="../node_modules/jquery/dist/jquery.js">
</script>
<script src="../node_modules/popper.js/dist/popper.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>