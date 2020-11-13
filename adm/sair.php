<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}

unset($_SESSION['nome']);
header('location: index.php');
