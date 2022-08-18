<?php
  require_once ("session.php");
  require_once("conexao.php");
  
  $idpedidos = $_GET['idpedidos'];
  $idveiculos = $_GET['idveiculos'];

  $sql = "update pedidos set veiculos_idveiculos = null where idpedidos = $idpedidos";

  if (pg_query($conexao, $sql)) {
    header("location: encaminhamentocadastro.php?idveiculos=$idveiculos");
  }
  else {
    echo "Deu erro " . pg_last_error($conexao);
  }

?>