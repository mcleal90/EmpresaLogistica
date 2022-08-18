<?php
  require_once ("session.php");
  require_once("conexao.php");

  $idveiculos= $_POST["idveiculos"];
  $veiculo= $_POST["veiculo"];
  $peso= $_POST["peso"];
  $volume= $_POST["volume"];

  if ($idveiculos == "") {
      $sql = "insert into veiculos (veiculo, peso, volume) values ('$veiculo', '$peso', '$volume')";
  }
  else {
      $sql = "update veiculos set veiculo = '$veiculo', peso = '$peso', volume = '$volume' where idveiculos = $idveiculos";
  }

  if (pg_query($conexao, $sql)) {
    header("location: veiculosmain.php");
  }
  else {
    echo "Deu erro";
  }
?>