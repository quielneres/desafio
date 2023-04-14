<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Loja de produtos</h1>
                <!--                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>-->
                <!--                <p>-->
                <!--                    <a href="#" class="btn btn-primary my-2">Main call to action</a>-->
                <!--                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>-->
                <!--                </p>-->
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php while ($tipoProduto = pg_fetch_object($listaProdutos)):
                    $imposto =  $tipoProduto->preco * ($tipoProduto->percentual_porcentagen / 100);


                    ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text"><?= $tipoProduto->descricao ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <form action="/enviar-compra" method="post">
                                            <input type="hidden" name="idProduto" value="<?= $tipoProduto->id ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary" name="enviarCompra">Comprar

                                            </button>
                                        </form>
                                        <!--                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
                                    </div>
                                    <small class="text-muted">Valor: R$<?= number_format($tipoProduto->preco, 2,',', '.') ?></small>
                                    <small class="text-muted">Imposto: R$<?=  number_format($imposto, 2,',', '.') ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>

</main>