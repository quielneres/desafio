<?php

namespace controller;

class ProdutoController extends BaseController
{

    protected $model;
    protected $modelTipo;

    public function __construct()
    {
        $this->model = new \model\Produto();
        $this->modelTipo = new \model\TipoProduto();
    }

    public function index()
    {
        $this->loadView('produtos/produtos', [
            'listaProdutos' => $this->model->listaProdutosComTipo()
        ]);

    }

    public function novoProduto()
    {
        $this->loadView('produtos/novo-produto', [
            'listaTipoProdutos' => $this->modelTipo->listaTiposProdutos()
        ]);
    }

    public function salvarProduto($params)
    {
        $tipoProduto = $params['tipoProduto'];
        $nomeProduto = $params['nomeProduto'];
        $precoProduto = $params['precoProduto'];
        $descricaoProduto = $params['descricaoProduto'];

        if (empty($tipoProduto)) {
            $this->errorMessage('Campo tipo produto é obrigatório');
            return;
        }
        if (empty($nomeProduto)) {
            $this->errorMessage('Campo nome é obrigatório');
            return;
        }
        if (empty($precoProduto)) {
            $this->errorMessage('Campo preço é obrigatório');
            return;
        }

        if (empty($descricaoProduto)) {
            $this->errorMessage('Campo tipo descrição é obrigatório');
            return;
        }
        $this->model->salvar($tipoProduto, $nomeProduto, $precoProduto, $descricaoProduto);

        $this->sucessoMessage('Operação realizada com sucesso!');
    }

    public function alterarProduto()
    {
        if (isset($_POST)) {
            if (isset($_POST['update'])) {
                $listaTipoProdutos = $this->modelTipo->listaTiposProdutos();
                $produto = pg_fetch_object($this->model->getProdutoId($_POST['idProduto']));
                $this->loadView('produtos/editar-produto', [
                    'listaTipoProdutos' => $listaTipoProdutos,
                    'produto' => $produto
                ]);
            }

            if (isset($_POST['delete'])) {

                $resp = $this->model->deletar($_POST['idProduto']);

                if (!$resp) {
                    $this->errorMessage('Item atrelado à uma compra, não é possivel excluir!');
                    header('Location: ' .BASE_URL . '/admin-tipo-produto');
                    return;
                }

                $this->sucessoMessage('Produto excluído com sucesso!');
                header('Location: ' .BASE_URL . '/admin-produtos');
                return;
            }

            $id               = $_POST['idProduto'];
            $idTipo           = $_POST['tipoProduto'];
            $nomeProduto      = $_POST['nomeProduto'];
            $precoProduto     = $_POST['precoProduto'];
            $descricaoProduto = $_POST['descricaoProduto'];

            $this->model->alterar($id, $idTipo, $nomeProduto, $precoProduto, $descricaoProduto);

            $this->sucessoMessage('Dados salvos com sucesso');
            header('Location: ' .BASE_URL . '/admin-produtos');
        }
    }
}