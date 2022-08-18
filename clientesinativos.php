<?php
    require_once ("session.php");
    require_once("conexao.php");
    require_once("cab-rod/cabecalho.php");
?>

    <main class="conteudo">        
        <section class="conteudo-principal">
            <h1 class="conteudo-principal-titulo">Clientes inativos</h1>
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
                                ativo = '0'";

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
                                    ativo = '0'
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
                                            <td align='center' width='200'>
                                                <a href='clientesativar.php?idclientes=$idclientes' class='cabecalho-menu-item'>Ativar</a>
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
                <a href="clientesmain.php" class="cabecalho-menu-item">Voltar</a>
            </div>
        </section>
    </main>

<?php
    require_once("cab-rod/rodape.php");
?>