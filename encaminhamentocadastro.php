<?php
    require_once("conexao.php");
    require_once("cab-rod/cabecalho.php");

    if (isset($_GET['idveiculos']) && $_GET['idveiculos']!="") {
            $idveiculos = $_GET['idveiculos'];
        
            $sql = "select
                    v.veiculo,
                    v.peso,
                    v.volume,
                    v.estado
                        from
                    veiculos v
                        where
                    v.idveiculos = $idveiculos";
                        
            $resultado = pg_query($conexao, $sql);
            $dados = pg_fetch_array($resultado);
          
            $veiculo = $dados['veiculo'];
            $vpeso = $dados['peso'];
            $vvolume = $dados['volume'];
            $estado = $dados['estado'];
    }          
?>

<main class="conteudo">        
    <section class="conteudo-principal">
        <h1 class="conteudo-principal-titulo">Encaminhamento</h1>
    </section>
    
    <section class="conteudo-secundario2">
        <form action="encaminhamentosalvar.php" method="POST" class="conteudo-secundario-formulario-encaminhamento">
            <div class="conteudo-formulario-encaminhamento">
                <input type="hidden" name="idveiculos" value="<?php echo $idveiculos; ?>">
                <label class="conteudo-secundario-titulo"> Veículo: <?php echo $veiculo ?> </label>
            </div>

            <div>
            <table border="1" class="tabela">
                    <thead>
                        <tr>
                            <th class="tabela-id">ID</th>
                            <th>Cliente</th>
                            <th class='tabela-cargas'>Peso/KG</th>
                            <th class='tabela-cargas'>Volume/m³</th>
                            <th>Destino</th>
                            <th class='tabela-editar'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "select
                                p.idpedidos,
                                c.nome,
                                p.peso,
                                p.volume,
                                p.destino
                            from
                                pedidos p
                                left join clientes c on c.idclientes = p.clientes_idclientes
                            where
                                veiculos_idveiculos = $idveiculos
                            order by
                                p.idpedidos";

                            $resultado = pg_query($conexao, $sql);
                            $cont = 0;
                            $totalpeso = 0;
                            $totalvolume = 0;
                            
                            while ($linha = pg_fetch_array($resultado)) {
                                $cont++;
                                $idpedidos = $linha['idpedidos'];
                                $nome = $linha['nome'];
                                $ppeso = $linha['peso'];
                                $pvolume = $linha['volume'];
                                $destino = $linha['destino'];
                                
                                $totalpeso = $totalpeso + $ppeso;
                                $totalvolume = $totalvolume + $pvolume;
                                
                                echo  "<tr>
                                            <td class='tabela-id'>$idpedidos</td>
                                            <td>$nome</td>
                                            <td class='tabela-cargas'>$ppeso</td>
                                            <td class='tabela-cargas'>$pvolume</td>
                                            <td>$destino</td>
                                            <td class='tabela-editar'>
                                                <a href='encaminhamentoremover.php?idpedidos=$idpedidos&idveiculos=$idveiculos' class='cabecalho-menu-item'>Remover</a>
                                            </td> 
                                        </tr>";
                            }                                
                        ?>
                    </tbody>

                </table>
            </div>

            <div class="conteudo-formulario-encaminhamento">
                <label> Carga: Peso <?php echo $totalpeso ?> / <?php echo $vpeso ?> | Volume <?php echo $totalvolume ?> / <?php echo $vvolume ?> </label>
                <br>
                <?php 
                    if ($totalpeso <= $vpeso && $totalvolume <= $vvolume) {
                        echo "<input type='submit' value='Encaminhar' class='conteudo-submit'>";                       
                    } else {
                        echo "<input type='submit' value='Encaminhar' class='conteudo-submit' disabled>";
                    }
                ?>
            </div>
        </form>
    </section>
</main>

<?php
    require_once("cab-rod/rodape.php");
?>