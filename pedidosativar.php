<?php
  require_once ("session.php");
  require_once("conexao.php");
  
  $idpedidos = $_GET['idpedidos'];

  $sql = "update pedidos set ativo = '1' where idpedidos = $idpedidos";

  if (pg_query($conexao, $sql)) {
    header("location: pedidosmain.php");
  }
  else {
    echo "Deu erro " . pg_last_error($conexao);
  }

?>