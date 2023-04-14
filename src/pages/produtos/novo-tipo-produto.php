<style>
    label, input {
        position: relative;
        /*width: 78px;*/
    }

    label::after {
        content: '' attr(unit);
        position: absolute;
        top: 3px;
        left: 45px;
        font-family: arial, helvetica, sans-serif;
        font-size: 13px;
        color: rgba(0, 0, 0, 0.6);
        fo

</style>
<main class="container">

    <?php include 'src/pages/template/mensagens-validacao.php' ?>

    <div class="bg-light p-5 rounded">

        <h1>Tipos de produtos</h1>
        <p class="lead">Cadastrar novo produto</p>
        <form method="post">
            <div class="mb-3">
                <label for="nome_tipo_produto" class="form-label">Nome tipo produto</label>
                <input type="text" name="nome_tipo_produto" class="form-control" id="nome_tipo_produto"
                       aria-describedby="nome_tipo_produto">
            </div>
            <div class="mb-1">
                <label for="nome_tipo_produto" class="form-label">Percentual porcentagem</label>
            </div>
            <div class="mb-3">
                <label unit="%">
                    <input type='number' id="teste" class="form-control" name="percentualPorcentagen" step='0.01' value='0.01' min="0.01" max="70.00"
                           placeholder='0.00'/>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form
    </div>
</main>
