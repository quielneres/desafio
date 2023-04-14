<main class="container">
    <?php include 'src/pages/template/mensagens-validacao.php'?>

    <div class="bg-light p-5 rounded">
        <h1>Produtos</h1>
        <p class="lead">Cadastrar novo produto</p>

        <form method="post">
            <div class="mb-3">
                <label for="tipoProduto" class="form-label">Tipo de produto</label>
                <select id="tipoProduto" class="form-select" name="tipoProduto">
                    <option value="">Selecione</option>

                    <?php while ($tipoProduto = pg_fetch_object($listaTipoProdutos)): ?>
                        <option value="<?= $tipoProduto->id ?>"><?= $tipoProduto->descricao ?></option>
                    <?php endwhile; ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="nomeProduto" class="form-label">Nome produto</label>
                <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" aria-describedby="emailHelp">
            </div>


            <div class="mb-3">
                <label for="precoProduto" class="form-label">Preço produto</label>
                <input type="number" class="form-control" id="precoProduto" name="precoProduto" step="0.01" name="quantity" min="0.01"> '
            </div>
            <div class="mb-3">
                <label for="descricaiProduto" class="form-label">descrição produto</label>
                <textarea class="form-control" id="descricaiProduto" name="descricaoProduto" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form

    </div>
</main>
