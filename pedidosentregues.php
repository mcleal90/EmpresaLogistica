<?php
    require_once ("session.php");
    require_once("conexao.php");
    require_once("cab-rod/cabecalho.php");
?>

    <main class="conteudo">        
        <section class="conteudo-principal">
            <h1 class="conteudo-principal-titulo">Pedidos entregues</h1>
        </section>
        
        <section class="conteudo-secundario2">
            <div>
                <table border="1" class="tabela">
                    <thead>
                        <tr>
                            <th class="tabela-id">ID</th>
                            <th>Cliente</th>
                            <th>Destino</th>
                            <th>Peso/KG</th>
                            <th>Volume/m³</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql =  "
                            select
                                p.idpedidos,
                                c.nome,
                                p.destino,
                                p.peso,
                                p.volume,
                                p.situacao
                            from
                                pedidos p
                                left join clientes c on c.idclientes = p.clientes_idclientes
                            where
                                p.situacao = '2'
                            order by
                                p.idpedidos";

                            $resultado = pg_query($conexao, $sql);
                            $cont = 0;
                            while ($linha = pg_fetch_array($resultado)) {
                                $cont++;
                                $idpedidos = $linha['idpedidos'];
                                $nome = $linha['nome'];
                                $destino = $linha['destino'];
                                $peso = $linha['peso'];
                                $volume = $linha['volume'];
                                $situacao = $linha['situacao'];

                                 echo  "<tr>
                                            <td class='tabela-id'>$idpedidos</td>
                                            <td>$nome</td>
                                            <td>$destino</td>
                                            <td>$peso</td>
                                            <td>$volume</td>
                                        </tr>";
                            }
                        ?> 
                    </tbody>

                </table>
            </div>
            <div class="cabecalho-menu">
                <a href="pedidosmain.php" class="cabecalho-menu-item">Voltar</a>
            </div>
        </section>
    </main>

<?php
    require_once("cab-rod/rodape.php");
?>