<?php
    require_once ("session.php");
    require_once ("cab-rod/cabecalho.php");
    require_once ("conexao.php");

    if (isset($_GET['idveiculos']) && $_GET['idveiculos']!="") {
        $idveiculos = $_GET['idveiculos'];
    
        $sql = "select
                veiculo,
                peso,
                volume
                    from
                veiculos
                    where
                idveiculos = $idveiculos";
                    
        $resultado = pg_query($conexao, $sql);
        $dados = pg_fetch_array($resultado);
      
        $veiculo = $dados['veiculo'];
        $peso = $dados['peso'];
        $volume = $dados['volume'];
      }
      else {
        $idveiculos = "";
        $veiculo = "";
        $peso = "";
        $volume = "";
      }
    ?>
    
    <main class="conteudo">        
        <section class="conteudo-principal">
            <h1 class="conteudo-principal-titulo">Cadastro de veículos</h1>
        </section>
        <section class="conteudo-secundario2">
                    <form action="veiculossalvar.php" method="POST" class="conteudo-secundario-formulario">
                        <input type="hidden" name="idveiculos" value="<?php echo $idveiculos; ?>">
                    
                        <label class="conteudo-secundario-formulario-item">Veículo: </label>
                        <input type="text" name="veiculo" value="<?php echo $veiculo; ?>" class="conteudo-secundario-formulario-item">

                        <label class="conteudo-secundario-formulario-item">Peso: </label>
                        <input type="text" name="peso" value="<?php echo $peso; ?>" class="conteudo-secundario-formulario-item">

                        <label class="conteudo-secundario-formulario-item">Volume: </label>
                        <input type="text" name="volume" value="<?php echo $volume; ?>" class="conteudo-secundario-formulario-item">
                        <br>
                        <input type="submit" value="Salvar" class="conteudo-submit">
                    </form>
                
            <a href="veiculosmain.php" class="cabecalho-menu-item">Voltar</a>
        </section>
    </main>
<?php
    require_once ("cab-rod/rodape.php")
?>