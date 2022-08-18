<?php
  require_once ("session.php");
  require_once("conexao.php");

  $idpedidos= $_POST["idpedidos"];
  $clientes_idclientes= $_POST["clientes_idclientes"];
  $veiculos_idveiculos= $_POST["veiculos_idveiculos"]==''?'null':$_POST["veiculos_idveiculos"];
  $peso= $_POST["peso"];
  $volume= $_POST["volume"];
  $destino= $_POST["destino"];

  if ($idpedidos == "") {
      $sql = "insert into pedidos (clientes_idclientes, veiculos_idveiculos, peso, volume, destino) values ('$clientes_idclientes', $veiculos_idveiculos, '$peso', '$volume', '$destino')";
  }
  else {
      $sql = "update pedidos set clientes_idclientes = '$clientes_idclientes', veiculos_idveiculos = $veiculos_idveiculos, peso = '$peso', volume = '$volume', destino = '$destino' where idpedidos = $idpedidos";
  }

  if (pg_query($conexao, $sql)) {
      header("location: pedidosmain.php");
  }
  else {
    echo "Deu erro";
  }
?>