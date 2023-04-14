<?php
    $imposto     = $produto->preco * ($produto->percentual_porcentagen / 100);
    $totalCompra = $produto->preco + $imposto;
?>
<div class="container">
    <main>
        <div class="py-5 text-center">
           <h2>Finalizar venda</h2>
        </div>

        <?php include 'src/pages/template/mensagens-validacao.php'?>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Seu carrinho</span>
<!--                    <span class="badge bg-primary rounded-pill">3</span>-->
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Nome do produto</h6>
                            <small class="text-muted"><?= $produto->nome?></small>
                        </div>
                        <span class="text-muted">R$<?= number_format($produto->preco, 2, ',','.')?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Taxa juro tipo produto</h6>
                            <small class="text-muted"><?= $produto->descricao_tipo?></small>
                        </div>
                        <span class="text-muted">R$<?= number_format($imposto, 2, ',','.') ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>R$<?= number_format($totalCompra, 2, ',', '.')?></strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-lg-8">

                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                        <div class="card-body">
                            <p class="card-text"><?= $produto->nome?></p>
                        </div>
                    </div>
                </div>

                <h4 class="mb-3 mt-5">Preencha os dados</h4>

                <form class="needs-validation" novalidate method="post" action="/salvar-compra">

                    <input type="hidden" value="<?=$totalCompra?>" name="totalCompra">
                    <input type="hidden" value="<?=$imposto?>" name="imposto">
                    <input type="hidden" value="<?=$produto->preco ?>" name="valorProduto">
                    <input type="hidden" value="<?=$produto->id ?>" name="idProduto">

                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label for="firstName" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" id="firstName" name="nomeCompleto" placeholder="" value="" required>

                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                            <input type="email" class="form-control" id="email" name="emailComprador" placeholder="seu@exemplo.com">

                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit" name="finalizarCompra">Finalizar pedido</button>
                </form>
            </div>
        </div>
    </main>

</div>
