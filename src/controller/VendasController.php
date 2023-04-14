<?php

namespace controller;

class VendasController extends BaseController
{

    protected $model;
    protected $modelProduto;

    public function __construct()
    {
        $this->model = new \model\Venda();
        $this->modelProduto = new \model\Produto();
    }

    public function index()
    {
        $produto = pg_fetch_object($this->modelProduto->listaProdutosComTipoId($_POST['idProduto']));
        $this->loadView('vendas/vendas', [
            'produto' =>  $produto
        ]);
    }
    public function listarVendas()
    {
        $vendas = $this->model->listaVendas();
        $this->loadView('vendas/listar-vendas', ['vendas' => $vendas]);
    }

    public function salvarCompra()
    {
        $idProduto = $_POST['idProduto'];
        $imposto = $_POST['imposto'];
        $valorProduto = $_POST['valorProduto'];
        $totalCompra = $_POST['totalCompra'];
        $nomeCompleto = $_POST['nomeCompleto'];
        $email = $_POST['emailComprador'];

        if (empty($nomeCompleto)) {
            $this->errorMessage('Campo tipo nome completo é obrigatório');
            $produto = pg_fetch_object($this->modelProduto->listaProdutosComTipoId($_POST['idProduto']));
            $this->loadView('vendas/vendas', [
                'produto' =>  $produto
            ]);
            return;
        }
        if (empty($email)) {
            $this->errorMessage('Campo e-mail é obrigatório');
            $produto = pg_fetch_object($this->modelProduto->listaProdutosComTipoId($_POST['idProduto']));
            $this->loadView('vendas/vendas', [
                'produto' =>  $produto
            ]);
            return;
        }

        $this->model->salvar($idProduto, $imposto, $valorProduto, $totalCompra,$nomeCompleto, $email);

        $this->sucessoMessage('Operação realizada com sucesso!');
        header('Location: ' .BASE_URL . '/listar-vendas');
    }
}