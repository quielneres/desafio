<?php

namespace model;

class Produto
{

    public function getProdutoId($id)
    {
        $sql ="select * from produtos where id = " .$id . ";";
        return pg_query($sql);
    }

    public function listaProdutosComTipoId($id)
    {
        $sql ="select p.*, tp.descricao as descricao_tipo, percentual_porcentagen from produtos p inner join tipo_produto tp on tp.id = p.id_tipo_produto where p.id = " .$id . " ORDER BY p.id DESC;";
        return pg_query($sql);
    }
    public function listaProdutosComTipo()
    {
        $sql ="select p.*, tp.descricao as descricao_tipo, percentual_porcentagen from produtos p inner join tipo_produto tp on tp.id = p.id_tipo_produto ORDER BY p.id DESC;";
        return pg_query($sql);
    }

    public function salvar($tipoProduto, $nomeProduto, $precoProduto, $descricaoProduto)
    {
        $sql = "insert into produtos (id, id_tipo_produto, nome, preco, descricao) values (default, " . $tipoProduto . ", '" . $nomeProduto . "', " . $precoProduto . ", '" . $descricaoProduto . "');";
        return pg_affected_rows(pg_query($sql));

    }

    public function alterar($id, $idTipo, $nomeProduto, $precoProduto, $descricaoProduto)
    {
        $sql = "UPDATE produtos SET id_tipo_produto = ".$idTipo.", nome = '".$nomeProduto."', preco = ".$precoProduto.", descricao = '".$descricaoProduto."' WHERE id = ".$id.";";
        return pg_affected_rows(pg_query($sql));

    }

    public function deletar($id)
    {
        $sql ="delete from  produtos where id='".$id."'";
        return pg_query($sql);
    }
}