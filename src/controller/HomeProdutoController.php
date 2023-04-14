<?php

namespace controller;

class HomeProdutoController extends BaseController
{
    protected $modelProduto;

    public function __construct()
    {
        $this->modelProduto = new \model\Produto();
    }
    public function index()
    {
        $listaProdutos = $this->modelProduto->listaProdutosComTipo();
        $this->loadView('home', ['listaProdutos' => $listaProdutos]);
    }
}