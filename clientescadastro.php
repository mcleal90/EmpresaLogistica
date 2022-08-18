<?php
    require_once ("session.php");
    require_once ("cab-rod/cabecalho.php");
    require_once ("conexao.php");

    if (isset($_GET['idclientes']) && $_GET['idclientes']!="") {
        $idclientes = $_GET['idclientes'];
    
        $sql = "select
                nome,
                cpf,
                email,
                telefone
                    from
                clientes
                    where
                idclientes = $idclientes";
            
        $resultado = pg_query($conexao, $sql);
        $dados = pg_fetch_array($resultado);
      
        $nome = $dados['nome'];
        $cpf = $dados['cpf'];
        $email = $dados['email'];
        $telefone = $dados['telefone'];
      }
      else {
        $idclientes = "";
        $nome = "";
        $cpf = "";
        $email = "";
        $telefone = "";
      }
    ?>
    
    <main class="conteudo">        
        <section class="conteudo-principal">
            <h1 class="conteudo-principal-titulo">Cadastro de clientes</h1>
        </section>
        <section class="conteudo-secundario2">
                    <form action="clientessalvar.php" method="POST" class="conteudo-secundario-formulario">
                        <input type="hidden" name="idclientes" value="<?php echo $idclientes; ?>">
                    
                        <label class="conteudo-secundario-formulario-item">Nome: </label>
                        <input type="text" name="nome" value="<?php echo $nome; ?>" class="conteudo-input">

                        <label class="conteudo-secundario-formulario-item">CPF: </label>
                        <input type="text" name="cpf" value="<?php echo $cpf; ?>" class="conteudo-secundario-formulario-item">

                        <label class="conteudo-secundario-formulario-item">Email: </label>
                        <input type="text" name="email" value="<?php echo $email; ?>" class="conteudo-secundario-formulario-item">

                        <label class="conteudo-secundario-formulario-item">Telefone: </label>
                        <input type="text" name="telefone" value="<?php echo $telefone; ?>" class="conteudo-secundario-formulario-item">
                        <br>
                        <input type="submit" value="Salvar" class="conteudo-submit">
                    </form>

                    <a href="clientesmain.php" class="cabecalho-menu-item">Voltar</a>
        </section>
        
    </main>
<?php
    require_once ("cab-rod/rodape.php")
?>