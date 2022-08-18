<?php
    require_once ("session.php");
    require_once ("conexao.php");
    require_once ("cab-rod/cabecalho.php")
?>

    <main class="conteudo">
        <section class="conteudo-principal">
            <div>
                <h1 class="conteudo-principal-titulo">UNILOG - Gestão de Logística</h1>
            </div>
        </section>

        <section class="conteudo-secundario">
            <div class="conteudo-descricao">
                <h2 class="conteudo-secundario-titulo">Recursos disponíveis neste sistema</h2>
                <p class="conteudo-secundario-paragrafo">Este sistema atende a demanda de uma empresa de logística, cadastrando clientes, com seus dados pessoais e contatos, frota de veículos da empresa, administrando a capacidade de carga e características do veículo, cadastro de pedidos, vinculado ao cliente solicitante, incluindo o peso e volume do pedido e destino e o encaminhamento em si, onde acompanha o veículo e os pedidos que estão em entrega e atualiza se ele for entregue ou irá retornar a empresa.</p>
            </div>
            <div>
                <img src="img/imglogistica.png" alt="logistica" class="conteudo-secundario-imagem">
            </div>
        </section>
    </main>
    
<?php
    require_once ("cab-rod/rodape.php");
?>   
</body>