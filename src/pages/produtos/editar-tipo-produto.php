<main class="container">

    <?php include 'src/pages/template/mensagens-validacao.php'?>

    <div class="bg-light p-5 rounded">

        <h1>Tipos de produtos</h1>
        <p class="lead">Editar tipo produto</p>
        <form method="post">
            <div class="mb-3">
                <label for="nome_tipo_produto" class="form-label">Nome tipo produto</label>
                <input type="hidden" value="<?= $tipoProduto->id ?>" name="id">
                <input type="text" name="nome_tipo_produto" class="form-control" id="nome_tipo_produto"
                       aria-describedby="nome_tipo_produto" value="<?= $tipoProduto->descricao ?>">
            </div>
            <div class="mb-1">
                <label for="nome_tipo_produto" class="form-label">Percentual porcentagem</label>
            </div>
            <div class="mb-3">
                <label unit="%">
                    <input type='number' id="teste" class="form-control" name="percentualPorcentagen" step='0.01' value="<?= $tipoProduto->percentual_porcentagen ?>" min="0.01" max="70.00"
                           placeholder='0.00'/>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form
    </div>
</main>
