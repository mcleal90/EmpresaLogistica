<?php
  require_once ("session.php");
  require_once("conexao.php");

  $idveiculos = $_GET["idveiculos"];
  
  $sql = "update veiculos set estado = '0' where idveiculos = $idveiculos";

  if (pg_query($conexao, $sql)) {

    $sql2 = "update pedidos set situacao = '2' where veiculos_idveiculos = $idveiculos";  

    if (pg_query($conexao, $sql2)) {
      header("location: encaminhamentomain.php");
    }
    else {
      echo "Deu erro";
    }
  }
  else {
    echo "Deu erro";
  }
?>