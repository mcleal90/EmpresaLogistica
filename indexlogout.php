<?php

session_start();

unset($_SESSION['idlogin']);

header("Location: index.php");

?>