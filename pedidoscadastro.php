<?php
    require_once ("session.php");
    require_once ("cab-rod/cabecalho.php");
    require_once ("conexao.php");

    if (isset($_GET['idpedidos']) && $_GET['idpedidos']!="") {
        $idpedidos = $_GET['idpedidos'];
    
        $sql =  "select
                clientes_idclientes,
                veiculos_idveiculos,
                peso,
                volume,
                destino
                    from
                pedidos
                    where
                idpedidos = $idpedidos";
                    
        $resultado = pg_query($conexao, $sql);
        $dados = pg_fetch_array($resultado);
      
        $clientes_idclientes = $dados['clientes_idclientes'];
        $veiculos_idveiculos = $dados['veiculos_idveiculos'];
        $volume = $dados['volume'];
        $peso = $dados['peso'];
        $destino = $dados['destino'];
      }
      else {
        $idpedidos = "";
        $clientes_idclientes = "";
        $veiculos_idveiculos = "";
        $volume = "";
        $peso = "";
        $destino = "";
      }
    ?>
    
    <main class="conteudo">        
        <section class="conteudo-principal">
            <h1 class="conteudo-principal-titulo">Cadastro de pedidos</h1>
        </section>
        <section class="conteudo-secundario2">
            <form action="pedidossalvar.php" method="POST" class="conteudo-secundario-formulario">
                <input type="hidden" name="idpedidos" value="<?php echo $idpedidos; ?>">
            
                <label class="conteudo-secundario-formulario-item">Cliente: </label>
                <select name="clientes_idclientes" class="conteudo-select">
                    <option value="">Selecione um cliente</option>
                    <?php
                        $sql =  "select
                            idclientes,
                            nome,
                            ativo
                                from
                            clientes
                                where
                            ativo = '1'";
                        $resultado = pg_query($conexao, $sql);
                        $cont = 0;
                        while ($linha = pg_fetch_array($resultado)) {
                            $cont++;
                            $idclientes = $linha['idclientes'];
                            $nome = $linha['nome'];
                            
                            if ($idclientes == $clientes_idclientes) {
                                echo "<option value='$idclientes' selected>" .$nome. "</option>";
                            } else {
                                echo "<option value='$idclientes'>" .$nome. "</option>";
                            }                                    
                        }
                    ?>
                </select>

                <label class="conteudo-secundario-formulario-item">Peso: </label>
                <input type="text" name="peso" value="<?php echo $peso; ?>" class="conteudo-secundario-formulario-item">

                <label class="conteudo-secundario-formulario-item">Volume: </label>
                <input type="text" name="volume" value="<?php echo $volume; ?>" class="conteudo-secundario-formulario-item">
                
                <label class="conteudo-secundario-formulario-item">Destino: </label>
                <input type="text" name="destino" value="<?php echo $destino; ?>" class="conteudo-secundario-formulario-item">
                
                <label class="conteudo-secundario-formulario-item">Veículo para transporte: </label>
                <select name="veiculos_idveiculos" class="conteudo-select">
                    <option value="">Selecione um veículo</option>
                    <?php
                        $sql = "select
                        idveiculos,
                        veiculo,
                        peso,
                        volume,
                        estado,
                        ativo
                            FROM
                        veiculos
                            WHERE
                        ativo = '1' AND
                        estado = '0'";
                        $resultado = pg_query ($conexao, $sql);
                        $cont = 0;
                        while ($linha = pg_fetch_array($resultado)) {
                            $cont++;
                            $idveiculos = $linha['idveiculos'];
                            $veiculo = $linha['veiculo'];
                            $peso = $linha['peso'];
                            $volume = $linha['volume'];
                            $estado = $linha['estado'];
                            $ativo = $linha['ativo'];

                            if ($idveiculos == $veiculos_idveiculos) {
                                echo "<option value='$idveiculos' selected>" .$veiculo. "</option>";
                            } else {
                                echo "<option value='$idveiculos'>" .$veiculo. "</option>";
                            }
                        }
                    ?>
                </select>
                <br>
                <input type="submit" value="Salvar" class="conteudo-submit">
            </form>
                
            <a href="pedidosmain.php" class="cabecalho-menu-item">Voltar</a>
        </section>
    </main>
<?php
    require_once ("cab-rod/rodape.php")
?>


