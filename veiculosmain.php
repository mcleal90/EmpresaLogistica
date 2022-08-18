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
            <h1 class="conteudo-principal-titulo">Cadastro de veículos</h1>
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
                                ativo = '1'";

                            $resultado = pg_query($conexao, $sql);
                            $linha = pg_fetch_array($resultado);
                                if ($linha ['qtd'] > 0) {

                                
                        ?>
                <table border="1" class="tabela">
                    <thead>
                        <tr>
                            <th class="tabela-id">ID</th>
                            <th>Veículo</th>
                            <th class='tabela-cargas'>Peso/KG</th>
                            <th class='tabela-cargas'>Volume/m³</th>
                            <th>Estado</th>
                            <th class='tabela-editar'></th>
                        </tr>
                    </thead>
                    <tbody>
                                        <?php
                            $sql = "select
                                    idveiculos,
                                    veiculo,
                                    peso,
                                    volume,
                                    estado
                                        from
                                    veiculos
                                        where
                                    ativo = '1' and
                                    estado = '0'
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
                                $estado = $linha['estado'];

                                 echo  "<tr>
                                            <td class='tabela-id'>$idveiculos</td>
                                            <td>$veiculo</td>
                                            <td class='tabela-cargas'>$peso</td>
                                            <td class='tabela-cargas'>$volume</td>
                                            <td>";
                                            if ($estado == 0) {
                                                echo "Disponível";
                                            } else {
                                                echo "Em entrega";
                                            }
                                            echo
                                            "</td>
                                            <td class='tabela-editar'>                                                
                                                <a href='encaminhamentocadastro.php?idveiculos=$idveiculos' class='cabecalho-menu-item'>Encaminhar</a>
                                                |
                                                <a href='veiculoscadastro.php?idveiculos=$idveiculos' class='cabecalho-menu-item'>Editar</a>
                                                |
                                                <a href='veiculosexcluir.php?idveiculos=$idveiculos' onClick='return valida_exc();' class='cabecalho-menu-item'>Excluir</a>
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
                <a href="veiculoscadastro.php" class="cabecalho-menu-item">Novo</a>
                <a href="veiculosinativos.php" class="cabecalho-menu-item">Lixeira</a>
            </div>
        </section>
    </main>

<?php
    require_once("cab-rod/rodape.php");
?>