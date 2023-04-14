<main class="container">

    <?php include 'src/pages/template/mensagens-validacao.php'?>

    <div class="bg-light p-5 rounded">
        <h1>Vendas</h1>
        <p class="lead">Lista de de vendas</p>

        <table class="table table-bordered mt-5">
            <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome comprador</th>
                <th scope="col">E-mail comprador</th>
                <th scope="col">Nome produto</th>
                <th scope="col">Tipo produto</th>
                <th scope="col">Valor produto</th>
                <th scope="col">Imposto</th>
                <th scope="col">Valor total</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($venda = pg_fetch_object($vendas)): ?>
                <tr>
                    <th scope="row"><?= $venda->id ?></th>
                    <td><?= $venda->nome_comprador ?></td>
                    <td><?= $venda->email ?></td>
                    <td><?= $venda->nome_produto ?></td>
                    <td><?= $venda->descricao_tipo ?></td>
                    <td><?= number_format($venda->valor_produto,2, ',', '.') ?></td>
                    <td><?= number_format($venda->imposto,2, ',', '.') ?></td>
                    <td><?= number_format($venda->valor_total,2, ',', '.') ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>