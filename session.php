<?php
    session_start();
    if (!isset($_SESSION['idlogin']) || $_SESSION['idlogin'] == "") {
        header("location: index.php?msg=1");
    }
?>