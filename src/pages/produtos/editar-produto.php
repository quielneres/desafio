<main class="container">

    <?php include 'src/pages/template/mensagens-validacao.php'?>

    <div class="bg-light p-5 rounded">

        <h1>Produto</h1>
        <p class="lead">Editar produto</p>
        <form method="post">
            <input type="hidden" value="<?= $produto->id ?>" name="idProduto">

            <div class="mb-3">
                <label for="tipoProduto" class="form-label">Tipo de produto</label>
                <select id="tipoProduto" class="form-select" name="tipoProduto">


                    <?php while ($tipoProduto = pg_fetch_object($listaTipoProdutos)): ?>

                        <?php if ($tipoProduto->id == $produto->id_tipo_produto):?>
                            <option value="<?= $tipoProduto->id ?>"><?= $tipoProduto->descricao ?></option>
                        <?php endif;?>

                        <option value="<?= $tipoProduto->id ?>"><?= $tipoProduto->descricao ?></option>
                    <?php endwhile; ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="nomeProduto" class="form-label">Nome produto</label>
                <input type="text" class="form-control" id="nomeProduto" value="<?=$produto->nome;?>"
                       name="nomeProduto" aria-describedby="emailHelp">
            </div>


            <div class="mb-3">
                <label for="precoProduto" class="form-label">Preço produto</label>
                <input type="text"  value="<?= $produto->preco ?>" class="form-control" id="precoProduto" name="precoProduto">
            </div>
            <div class="mb-3">
                <label for="descricaiProduto" class="form-label">descrição produto</label>
                <textarea class="form-control" id="descricaiProduto" name="descricaoProduto" rows="3"><?= $produto->descricao ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form
    </div>
</main>
