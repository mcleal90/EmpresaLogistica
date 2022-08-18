<?php
    require_once ("session.php");
    require_once("conexao.php");
    require_once("cab-rod/cabecalho.php");
?>

    <main class="conteudo">        
        <section class="conteudo-principal">
            <h1 class="conteudo-principal-titulo">Veículos inativos</h1>
        </section>
        
        <section class="conteudo-secundario2">
            <div>
            <!-- Testar número de registros -->
            <?php
                            $sql = "
                            select count (
                                idveiculos) as qtd
                            from
                                veiculos
                            where
                                ativo = '0'";

                            $resultado = pg_query($conexao, $sql);
                            $linha = pg_fetch_array($resultado);
                                if ($linha ['qtd'] > 0) {

                                
                        ?> 

                <table border="1" class="tabela">
                    <thead>
                        <tr>
                            <th class="tabela-id">ID</th>
                            <th>Veículo</th>
                            <th>Peso/KG</th>
                            <th>Volume/m³</th>
                        </tr>
                    </thead>
                    <tbody>
                                        <?php
                            $sql = "select
                                    idveiculos,
                                    veiculo,
                                    peso,
                                    volume
                                        from
                                    veiculos
                                        where
                                    ativo = '0'
                                        order by
                                    idveiculos,
                                    veiculo";

                            $resultado = pg_query($conexao, $sql);
                            $cont = 0;
                            while ($linha = pg_fetch_array($resultado)) {
                                $cont++;
                                $idveiculos = $linha['idveiculos'];
                                $veiculo = $linha['veiculo'];
                                $peso = $linha['peso'];
                                $volume = $linha['volume'];

                                 echo  "<tr>
                                            <td class='tabela-id'>$idveiculos</td>
                                            <td>$veiculo</td>
                                            <td>$peso</td>
                                            <td>$volume</td>
                                            <td align='center' width='200'>
                                                <a href='veiculosativar.php?idveiculos=$idveiculos' class='cabecalho-menu-item'>Ativar</a>
                                            </td> 
                                        </tr>";
                            }
                        ?> 
                    </tbody>

                </table>
                        <?php }
                        else {
                            echo "Nenhum registro encontrado";
                        }
                        ?>
            </div>
            <div class="cabecalho-menu">
                <a href="veiculosmain.php" class="cabecalho-menu-item">Voltar</a>
            </div>
        </section>
    </main>

<?php
    require_once("cab-rod/rodape.php");
?>