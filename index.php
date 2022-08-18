<?php
    require_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>PATP 5 - Logística</title>
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho-logo">
            <img src="img/logoideau.png" alt="Logo Ideau">
            <h2 class="cabecalho-titulo">UNIDEAU</h2>
        </div>
        <div>
            <nav class="cabecalho-menu">
                <!-- <a href="index.html" class="cabecalho-menu-item">Home</a>
                <a href="cliente.html" class="cabecalho-menu-item">Cliente</a>
                <a href="empresa.html" class="cabecalho-menu-item">Empresa</a>
                <a href="" class="cabecalho-menu-item">Sobre</a> -->
            </nav>
        </div>
        <nav class="cabecalho-menu">
            <!-- <a href="index.html" class="cabecalho-menu-item">Logout</a> -->
        </nav>
    </header>

    <main class="conteudo">
        <section class="conteudo-principal">
                <div>
                    <h1 class="conteudo-principal-titulo">UNILOG - Gestão de Logística</h1>
                </div>
        </section>
        <section class="conteudo-secundario">
            <form action= "indexvalidar.php" method="POST" class="conteudo-secundario-formulario">
                <label class="conteudo-secundario-formulario-item">Nome do usuário: </label>
                <input type="text" name="usuario" class="conteudo-input">
                
                <label class="conteudo-secundario-formulario-item">Senha: </label>
                <input type="password" name="senha" class="conteudo-input">
                <br>
                <input type="submit" value="Login" class="conteudo-submit">
            </form>
        </section>
    </main>

<?php
    require_once ("cab-rod/rodape.php");
?>