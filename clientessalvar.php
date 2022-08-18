<?php
  require_once ("session.php");
  require_once("conexao.php");
  
  $idclientes = $_POST['idclientes'];
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];

  if ($idclientes == "") {
    $sql = "insert into clientes (nome, cpf, email, telefone) values ('$nome', '$cpf', '$email', '$telefone')";
  }
  else {
    $sql = "update clientes set nome = '$nome', cpf = '$cpf', email = '$email', telefone = '$telefone' where idclientes = $idclientes";
  }

  if (pg_query($conexao, $sql)) {
    header("location: clientesmain.php");
  }
  else {
    echo "Deu erro";
  }

?>