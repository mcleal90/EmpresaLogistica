<?php
    require_once("conexao.php");
    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if ($usuario == '' || $senha == '') {
      header("location: index.php?erro=1");
    }

    $sql= "select 
            idlogin
        from
          login
        where
          usuario like '". $usuario ."'
        and
          senha like '". $senha ."'";
    $resultado = pg_query($conexao, $sql);
    $dados = pg_fetch_array($resultado);

    if ($dados['idlogin'] == "") {
      header("location: index.php?msg=1");
  }
  else {
      session_start();
      $_SESSION['idlogin'] = $dados['idlogin'];
      header("location: indexlogon.php");
  }
?>