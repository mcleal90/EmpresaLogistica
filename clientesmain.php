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
            <h1 class="conteudo-principal-titulo">Cadastro de clientes</h1>
        </section>
        
        <section class="conteudo-secundario2">
            <div>
                
                                <!-- Testar número de registros -->
            <?php
                            $sql = "
                            select count (
                                idclientes) as qtd
                            from
                                clientes
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
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th class='tabela-editar'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "select
                                    idclientes,
                                    nome,
                                    cpf,
                                    email,
                                    telefone
                                        from
                                    clientes
                                        where
                                    ativo = '1'
                                        order by
                                    idclientes,
                                    nome";

                            $resultado = pg_query($conexao, $sql);
                            $cont = 0;
                            while ($linha = pg_fetch_array($resultado)) {
                                $cont++;
                                $idclientes = $linha['idclientes'];
                                $nome = $linha['nome'];
                                $cpf = $linha['cpf'];
                                $email = $linha['email'];
                                $telefone = $linha['telefone'];

                                 echo  "<tr>
                                            <td class='tabela-id'>$idclientes</td>
                                            <td>$nome</td>
                                            <td>$cpf</td>
                                            <td>$email</td>
                                            <td>$telefone</td>
                                            <td class='tabela-editar'>
                                                <a href='clientescadastro.php?idclientes=$idclientes' class='cabecalho-menu-item'>Editar</a>
                                                |
                                                <a href='clientesexcluir.php?idclientes=$idclientes' onClick='return valida_exc();' class='cabecalho-menu-item'>Excluir</a>
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
                <a href="clientescadastro.php" class="cabecalho-menu-item">Novo</a>
                <a href="clientesinativos.php" class="cabecalho-menu-item">Lixeira</a>
            </div>
        </section>
    </main>

<?php
    require_once("cab-rod/rodape.php");
?>

<!-- Troca das mensagens por icones (próxima atualização) -->
<!-- <a href='clientescadastro.php?idclientes=$idclientes'><img class='cabecalho-menu-item-icone' src='img/imgeditar.png'></a> -->
                                                