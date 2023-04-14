<?php

namespace model;

class Venda
{
    public function listaVendas()
    {
        $sql = "select v.id,
                       imposto,
                       valor_produto,
                       valor_total,
                       nome_comprador,
                       email,
                       nome         as nome_produto,
                       tp.descricao as descricao_tipo
                from vendas v
                         inner join produtos p on p.id = v.id_produto
                         inner join tipo_produto tp on tp.id = p.id_tipo_produto
                ORDER BY v.id DESC;";
        return pg_query($sql);
    }

    public function salvar($idProduto, $imposto, $valorProduto, $valorTotal, $nomeCompleto, $email)
    {
        $sql = "insert into vendas (id, id_produto, imposto, valor_produto, valor_total, nome_comprador, email) values (default, " .$idProduto. ", " .$imposto . ", " .$valorProduto. ", " .$valorTotal. ", '" .$nomeCompleto. "', '".$email."');";
        return pg_affected_rows(pg_query($sql));
    }
}