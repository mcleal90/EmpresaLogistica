<?php
    require_once ("session.php");
    require_once("conexao.php");
    require_once("cab-rod/cabecalho.php");
?>

<script type="text/javascript" language="javascript">
    function valida_retorno() {
        var retorno = confirm('Retornar encaminhamento?');

        return (retorno);
    }
</script>

    <main class="conteudo">        
        <section class="conteudo-principal">
            <h1 class="conteudo-principal-titulo">Encaminhamentos</h1>
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
                                estado = '1'";

                            $resultado = pg_query($conexao, $sql);
                            $linha = pg_fetch_array($resultado);
                                if ($linha ['qtd'] > 0) {

                                
                        ?>
                <table border="1" class="tabela">
                    <thead>
                        <tr>
                            <th class="tabela-id">ID</th>
                            <th>Veiculo</th>
                            <th>Peso</th>
                            <th>Volume</th>                            
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
                                    estado = '1'
                                        order by
                                    idveiculos,
                                    veiculo";

                            $resultado = pg_query($conexao, $sql);
                            $cont = 0;
                            while ($linha = pg_fetch_array($resultado)) {
                                $cont++;
                                $idveiculos = $linha['idveiculos'];
                                $veiculo = $linha['veiculo'];
                                $volume = $linha['volume'];
                                $peso = $linha['peso'];
                                $estado = $linha['estado'];

                                 echo  "<tr>
                                            <td class='tabela-id'>$idveiculos</td>
                                            <td>$veiculo</td>
                                            <td>$peso</td>
                                            <td>$volume</td>
                                            <td class='tabela-editar'>
                                                <a href='encaminhamentoentregue.php?idveiculos=$idveiculos' class='cabecalho-menu-item'>Entregue</a>
                                                |
                                                <a href='encaminhamentoretornar.php?idveiculos=$idveiculos' onClick='return valida_retorno();' class='cabecalho-menu-item'>Retornar</a>
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
        </section>
    </main>

<?php
    require_once("cab-rod/rodape.php");
?>