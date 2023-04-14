<main class="container">

    <?php include 'src/pages/template/mensagens-validacao.php'?>

    <div class="bg-light p-5 rounded">
        <h1>Produtos</h1>
        <p class="lead">Lista de produtos cadastrados</p>
        <a class="btn btn-lg btn-primary" href="/novo-produto" role="button">Novo produto &raquo;</a>

        <table class="table table-bordered mt-5">
            <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Tipo Produto</th>
                <th scope="col">Preço</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($produto = pg_fetch_object($listaProdutos)): ?>
                <tr>
                    <th scope="row"><?= $produto->id ?></th>
                    <td><?= $produto->nome ?></td>
                    <td><?= $produto->descricao ?></td>
                    <td><?= $produto->descricao_tipo ?></td>
                    <td><?= number_format($produto->preco, 2, ',', '.') ?></td>
                    <td>
                        <form action="/alterar-produto" method="post">
                            <input type="hidden" name="idProduto" value="<?= $produto->id ?>">
                            <input type="submit" class="btn btn-success" name="update" value="Alterar">
                            <input type="submit" onClick="return confirm('Por favor, confirme a deleção');"
                                   class="btn btn-danger"
                                   name="delete" value="Deletar">
                        </form>
                    </td>

                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>