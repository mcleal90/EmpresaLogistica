<?php
  require_once ("session.php");
  require_once("conexao.php");
  
  $idclientes = $_GET['idclientes'];

  $sql = "update clientes set ativo = '1' where idclientes = $idclientes";

  if (pg_query($conexao, $sql)) {
    header("location: clientesmain.php");
  }
  else {
    echo "Deu erro " . pg_last_error($conexao);
  }

?>