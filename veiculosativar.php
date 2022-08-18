<?php
  require_once ("session.php");
  require_once("conexao.php");
  
  $idveiculos = $_GET['idveiculos'];

  $sql = "update veiculos set ativo = '1' where idveiculos = $idveiculos";

  if (pg_query($conexao, $sql)) {
    header("location: veiculosinativos.php");
  }
  else {
    echo "Deu erro " . pg_last_error($conexao);
  }

?>