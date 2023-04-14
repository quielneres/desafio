DROP TABLE IF EXISTS tipo_produto;
DROP TABLE IF EXISTS produtos;

CREATE TABLE tipo_produto
(
    id                     INT GENERATED ALWAYS AS IDENTITY,
    descricao              VARCHAR(255)   NOT NULL,
    percentual_porcentagen NUMERIC(10, 2) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE produtos
(
    id              INT GENERATED ALWAYS AS IDENTITY,
    id_tipo_produto INT,
    nome            VARCHAR(255)   NOT NULL,
    preco           NUMERIC(10, 2) NOT NULL,
    descricao       TEXT           NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_produto
        FOREIGN KEY (id_tipo_produto)
            REFERENCES tipo_produto (id)
);

CREATE TABLE vendas
(
    id             INT GENERATED ALWAYS AS IDENTITY,
    id_produto     INT,
    imposto        NUMERIC(10, 2) NOT NULL,
    valor_produto  NUMERIC(10, 2) NOT NULL,
    valor_total    NUMERIC(10, 2) NOT NULL,
    nome_comprador VARCHAR(255)   NOT NULL,
    email          VARCHAR(255)   NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_produto
        FOREIGN KEY (id_produto)
            REFERENCES produtos (id)
);

