<?php
include_once 'config/connection.php';
include_once 'src/pages/template/header.php';


//models
include 'src/model/TipoProduto.php';
include 'src/model/Produto.php';
include 'src/model/Venda.php';

//controller
include 'src/controller/BaseController.php';
include 'src/controller/HomeProdutoController.php';
include 'src/controller/ProdutoController.php';
include 'src/controller/TipoProdutoController.php';
include 'src/controller/VendasController.php';


class Router
{
    public function getPath($requestUri)
    {
        switch ($requestUri) {

            case $requestUri === "/":
                $this->home();
                break;
            case $requestUri === "/admin-produtos":
                $this->produtos();
                break;
            case $requestUri === "/novo-produto":
                $this->novoProduto();
                break;
            case $requestUri === "/alterar-produto":
                $this->alterarProduto();
                break;
            case $requestUri === "/admin-tipo-produto":
                $this->tipoProduto();
                break;
            case $requestUri === "/novo-tipo-produto":
                $this->novoTipoProduto();
                break;
            case $requestUri === "/enviar-compra":
                $this->enviarCompra();
                break;
            case $requestUri === "/salvar-compra":
                $this->salvarCompra();
                break;
            case $requestUri === "/alterar-tipo-produto":
                $this->alterarTipoProduto();
                break;
            case $requestUri === "/deletar-tipo-produto":
                $this->deletarTipoProduto();
                break;
            case $requestUri === "/listar-vendas":
                $this->listarVendas();
                break;
        }
    }

    public function enviarCompra()
    {
        $vendas = new \controller\VendasController();
        $vendas->index();
    }

    public function salvarCompra()
    {
        $vendas = new \controller\VendasController();
        $vendas->salvarCompra();
    }

    public function listarVendas()
    {
        $vendas = new \controller\VendasController();
        $vendas->listarVendas();
    }

    public function home()
    {
        $home = new \controller\HomeProdutoController();
        $home->index();
    }

    public function produtos()
    {
        $produto = new \controller\ProdutoController();
        $produto->index();
    }

    public function novoProduto()
    {
        $produto = new \controller\ProdutoController();

        if (!empty($_POST)) {
            $produto->salvarProduto($_POST);
        }
        $produto->novoProduto();
    }

    public function alterarProduto()
    {
        $produto = new \controller\ProdutoController();
        $produto->alterarProduto();
    }

    public function tipoProduto()
    {
        $tipoProduto = new \controller\TipoProdutoController();
        $tipoProduto->index();
    }

    public function novoTipoProduto()
    {
        $tipoProduto = new \controller\TipoProdutoController();

        if (!empty($_POST)) {
            $tipoProduto->salvarTipoProduto($_POST);
        }
        $tipoProduto->novoTipoProduto();
    }

    public function alterarTipoProduto()
    {
        $tipoProduto = new \controller\TipoProdutoController();
        $tipoProduto->alterarTipoProduto();
    }

}