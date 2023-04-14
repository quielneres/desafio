<?php

namespace controller;


class TipoProdutoController extends BaseController
{

    protected $model;

    public function __construct()
    {
        $this->model = new \model\TipoProduto();
    }

    public function index()
    {
        $listaTipoProdutos = $this->model->listaTiposProdutos();
        $this->loadView('produtos/tipo-produto', ['listaTipoProdutos' => $listaTipoProdutos]);
    }

    public function novoTipoProduto()
    {
        $this->loadView('produtos/novo-tipo-produto');
    }

    public function salvarTipoProduto($params)
    {
        $nome                  = $params['nome_tipo_produto'];
        $percentualPorcentagen = $params['percentualPorcentagen'];

        if (empty($nome)) {
            $this->errorMessage('Descrição do tipo é obrigatório');
            return;
        }
        if (empty($percentualPorcentagen)) {
            $this->errorMessage('Percentual Porcentagen é obrigatório');
            return;
        }

        $this->model->salvar($nome, $percentualPorcentagen);
        $this->sucessoMessage('Dados salvos com sucesso');
    }


    public function alterarTipoProduto()
    {
        if (isset($_POST)) {
            if (isset($_POST['update'])) {
                $tipoProduto = pg_fetch_object($this->model->getTipoProduoId($_POST['idTipoProduto']));

                $this->loadView('produtos/editar-tipo-produto', ['tipoProduto' => $tipoProduto]);
                return;
            }

            if (isset($_POST['delete'])) {
                $resp = $this->model->deletar($_POST['idTipoProduto']);
                if (!$resp) {
                    $this->errorMessage('Item atrelado à um produto, não é possivel excluir!');
                    header('Location: ' .BASE_URL . '/admin-tipo-produto');
                    return;
                }
                $this->sucessoMessage('Tipo produto excluído com sucesso!');
                header('Location: ' .BASE_URL . '/admin-tipo-produto');
                return;
            }

            $id   = $_POST['id'];
            $nome = $_POST['nome_tipo_produto'];
            $percentualPorcentagen = $_POST['percentualPorcentagen'];

            if (empty($nome)) {
                $this->errorMessage('Descrição do tipo é obrigatório');
                header('Location: ' .BASE_URL . '/admin-tipo-produto');
                return;
            }
            $this->model->alterar($id, $nome, $percentualPorcentagen);
            $this->sucessoMessage('Dados salvos com sucesso');
            header('Location: ' .BASE_URL . '/admin-tipo-produto');
        }
    }
}