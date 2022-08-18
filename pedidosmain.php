<?php
    require_once ("session.php");
    require_once("conexao.php");
    require_once("cab-rod/cabecalho.php");
?>

<script type="text/javascript" language="javascript">
    function valida_exc() {
        var retorno = confirm('Enviar registro para a lixeira?');

        return (retorno);
    }
</script>

    <main class="conteudo">        
        <section class="conteudo-principal">
            <h1 class="conteudo-principal-titulo">Cadastro de pedidos</h1>
        </section>
        
        <section class="conteudo-secundario2">
            <div>
                                <!-- Testar número de registros -->
            <?php
                            $sql = "
                            select count (
                                idpedidos) as qtd
                            from
                                pedidos
                            where
                                ativo = '1'";

                            $resultado = pg_query($conexao, $sql);
                            $linha = pg_fetch_array($resultado);
                                if ($linha ['qtd'] > 0) {

                                
                        ?>
                <table border="1" class="tabela">
                    <thead>
                        <tr>
                            <th class="tabela-id">ID</th>
                            <th>Cliente</th>
                            <th>Veículo</th>
                            <th>Destino</th>
                            <th class='tabela-cargas'>Peso/KG</th>
                            <th class='tabela-cargas'>Volume/m³</th>
                            <th>Situação</th>
                            <th class='tabela-editar'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql =  
                            "select
                                p.idpedidos,
                                c.nome,
                                v.veiculo,
                                p.destino,
                                p.peso,
                                p.volume,
                                p.situacao
                            from
                                pedidos p
                                left join clientes c on p.clientes_idclientes = c.idclientes
                                left join veiculos v on p.veiculos_idveiculos = v.idveiculos
                            where
                                p.ativo = '1' and
                                p.situacao = '0'
                            order by
                                p.idpedidos";
                            $resultado = pg_query($conexao, $sql);
                            $cont = 0;
                            while ($linha = pg_fetch_array($resultado)) {
                                $cont++;
                                $idpedidos = $linha['idpedidos'];
                                $nome = $linha['nome'];
                                $veiculo = $linha['veiculo'];
                                $destino = $linha['destino'];
                                $peso = $linha['peso'];
                                $volume = $linha['volume'];
                                $situacao = $linha['situacao'];

                                echo  
                                "<tr>
                                    <td class='tabela-id'>$idpedidos</td>
                                    <td>$nome</td>
                                    <td>$veiculo"; 
                                    if ($veiculo == '') {
                                        echo "Não vinculado"; 
                                    }
                                    echo  
                                    "
                                    </td>
                                    <td>$destino</td>
                                    <td class='tabela-cargas'>$peso</td>
                                    <td class='tabela-cargas'>$volume</td>
                                    <td>";
                                    if ($situacao == 0) {
                                        echo "Pendente"; 
                                    }
                                    else {
                                        echo "Encaminhado";
                                    }                                                
                                    echo  
                                    "</td>
                                    <td class='tabela-editar'>
                                        <a href='pedidoscadastro.php?idpedidos=$idpedidos' class='cabecalho-menu-item'>Editar</a>
                                        |
                                        <a href='pedidosexcluir.php?idpedidos=$idpedidos' onClick='return valida_exc();' class='cabecalho-menu-item'>Excluir</a>
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
                <a href="pedidoscadastro.php" class="cabecalho-menu-item">Novo</a>
                <a href="pedidosentregues.php" class="cabecalho-menu-item">Entregues</a>
                <a href="pedidosinativos.php" class="cabecalho-menu-item">Lixeira</a>
            </div>
        </section>
    </main>

<?php
    require_once("cab-rod/rodape.php");
?>