<main class="container">
    <?php include 'src/pages/template/mensagens-validacao.php'?>

    <div class="bg-light p-5 rounded">
        <h1>Tipos de produtos</h1>
        <p class="lead">Lista de tipos de produtos cadastrados</p>
        <a class="btn btn-lg btn-primary" href="/novo-tipo-produto" role="button">Novo tipo produto &raquo;</a>


        <table class="table table-bordered mt-5">
            <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Descrição</th>
                <th scope="col">Percentual de porcentagen</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>

            <?php while ($tipoProduto = pg_fetch_object($listaTipoProdutos)): ?>
                <tr>
                    <th scope="row"><?= $tipoProduto->id ?></th>
                    <td><?= $tipoProduto->descricao ?></td>
                    <td><?= $tipoProduto->percentual_porcentagen ?>%</td>
                    <td>
                        <form action="/alterar-tipo-produto" method="post">
                            <input type="hidden" value="<?= $tipoProduto->id ?>" name="idTipoProduto">
                            <input type="submit" class="btn btn-success" name="update" value="Alterar">
                            <input type="submit" onClick="return confirm('Por favor, confirme a deleção');"
                                   class="btn btn-danger"
                                   name="delete" value="Deletar">
                    </td>
                    </form>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>