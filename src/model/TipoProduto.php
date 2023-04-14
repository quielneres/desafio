<?php

namespace model;

class TipoProduto
{
    public function listaTiposProdutos() {
        $sql ="select * from tipo_produto ORDER BY id DESC;";
        return pg_query($sql);
    }

    public function getTipoProduoId($id)
    {
        $sql ="select * from tipo_produto where id = ". $id .";";
        return pg_query($sql);
    }

    public function salvar($nome, $percentualPorcentagen)
    {
        $sql = "insert into tipo_produto (id, descricao, percentual_porcentagen) values (default, '" . $nome . "', " .$percentualPorcentagen. ");";
        return pg_affected_rows(pg_query($sql));

    }
    public function alterar($id, $descrica, $percentualPorcentagen)
    {
        $sql = "update tipo_produto set descricao = '" . $descrica . "', percentual_porcentagen = " .$percentualPorcentagen. " where id = " . $id .";";
        return pg_affected_rows(pg_query($sql));

    }

    public function deletar($id)
    {
        $sql ="delete from  tipo_produto where id='".$id."'";
        return pg_query($sql);
    }
}