CREATE DATABASE IF NOT EXISTS cordhype;
use cordhype;

CREATE TABLE IF NOT EXISTS usuario (
    IdUsuario INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    CPF VARCHAR(11) NOT NULL,
    RG VARCHAR(8) NOT NULL,
    DtNasc DATE NOT NULL,
    Endereco VARCHAR(300) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    senha VARCHAR(10) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    Imagem VARCHAR(100) NOT NULL,
    PRIMARY KEY(IdUsuario)
);

CREATE TABLE IF NOT EXISTS categoria (
    idCategoria INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
        PRIMARY KEY(idCategoria)
);

CREATE TABLE IF NOT EXISTS produto (
    idProduto INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    Descricao VARCHAR(100) NOT NULL,
    VlrVenda VARCHAR(100) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    Fornecedor VARCHAR(100) NOT NULL,
    Tamanho VARCHAR(50) NOT NULL,
    Cor VARCHAR(10) NOT NULL,
    Imagem VARCHAR(100) NOT NULL,
        PRIMARY KEY(idProduto)
);

CREATE TABLE IF NOT EXISTS fornecedor (
    idFornecedor INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    CNPJ VARCHAR(50) NOT NULL,
        PRIMARY KEY(idFornecedor)
);

CREATE TABLE IF NOT EXISTS imagem (
    idImagem INT NOT NULL AUTO_INCREMENT,
    caminho VARCHAR(50) NOT NULL,
    idProduto INT NOT NULL,
    PRIMARY KEY(idImagem),
    CONSTRAINT fk_imagem_produto
        FOREIGN KEY (idProduto)
        REFERENCES produto (idProduto)
);
