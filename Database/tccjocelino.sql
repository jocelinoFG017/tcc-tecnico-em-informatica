DROP SCHEMA tccjocelino;
CREATE DATABASE tccjocelino;
USE tccjocelino;

-- Database: `tccjocelino`

--
-- Estrutura da tabela `niveis_acessos`
-- Somente 2 usuários (o usuario padrao e o admin)
/*
CREATE TABLE niveisAcesso (
  idNiveisAcesso int(11) NOT NULL auto_increment,
  nome varchar(45) NOT NULL,
  data date NOT NULL,
  modified int(11) DEFAULT NULL,
  PRIMARY KEY(idNiveisAcesso)
) ENGINE=InnoDB DEFAULT CHARSET = UTF8 COLLATE = utf8_general_ci;
*/
--
-- Estrutura da tabela `produto`
--

CREATE TABLE produto (
  idProduto int(11) NOT NULL auto_increment,
  nome varchar(45) NOT NULL,
  descricao varchar(45) NOT NULL,
  marca varchar(45) NOT NULL,
  quantidade varchar(45) NOT NULL,
  preco float(45) NOT NULL,
  PRIMARY KEY(idProduto)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE=utf8_general_ci;

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE usuario (
    idUsuario int(11) NOT NULL auto_increment,
    nome varchar(45) NOT NULL,
    login varchar(45) NOT NULL,
    senha varchar(45) NOT NULL,-- id niveis d acesso
    PRIMARY KEY(idUsuario)
    -- idNiveisAcesso int,
   -- CONSTRAINT fk_NiveisAcesso FOREIGN KEY(idNiveisAcesso) REFERENCES usuario(idUsuario)
)CHARSET=utf8;
--   CONSTRAINT fk_NiveisAcesso FOREIGN KEY (idNiveisAcesso) REFFERENCES usuario(idUsuario)
-- Normalização do endereco

-- Estrutura da tabela `Pais`

CREATE TABLE pais(
    idPais int(11) NOT NULL auto_increment,
    nome varchar(45) NOT NULL,
    PRIMARY KEY (idPais)
)CHARSET=utf8;

-- Estrutura da tabela `estado`

CREATE TABLE estado(
    idEstado int(11) NOT NULL auto_increment,
    nome varchar(45) NOT NULL,
    UF char(2) NOT NULL,
    idPais int,
    PRIMARY KEY (idEstado),
    CONSTRAINT fk_Pais FOREIGN KEY (idPais) REFERENCES pais(idPais)
)CHARSET=utf8;

-- Estrutura da tabela `cidade`

CREATE TABLE cidade(
    idCidade int(11) NOT NULL auto_increment,
    nome varchar(45) NOT NULL,
    cep int(9) not null,
    idEstado int,
    PRIMARY KEY (idCidade),
    CONSTRAINT fk_Estado FOREIGN KEY(idEstado) REFERENCES estado(idEstado)
)CHARSET=utf8;
-- Estrutura da tabela `endereco`

CREATE TABLE endereco (
    idEndereco int(11) NOT NULL auto_increment,
    bairro varchar(45) NOT NULL,
    rua varchar(45) NOT NULL,
    numero varchar(45) NOT NULL,
    telefone varchar(20) NOT NULL,
    idCidade int,
    idEstado int,
    idPais int,
    PRIMARY KEY (idEndereco),
    CONSTRAINT fk_EnderecoCidade FOREIGN KEY (idCidade) REFERENCES cidade(idCidade),
    CONSTRAINT fk_EnderecoEstado FOREIGN KEY (idEstado) REFERENCES estado(idEstado),
    CONSTRAINT fk_EnderecoPais FOREIGN KEY (idPais) REFERENCES pais(idPais)
)CHARSET=utf8;

-- POPULANO TABELAS

-- POPULANDO tabela `niveis_acessos`
/*
INSERT INTO niveisAcesso (idNiveisAcesso, nome, data, modified)
VALUES(1, 'administrador', '1928-10-10', NULL),
      (2, 'usuario', '1928-10-10', NULL);
*/

--  POPULANDO tabela`usuarios`

INSERT INTO usuario (idUsuario,nome,login, senha)
VALUES (1,'administrador', 'admin@admin.com.br', md5('1234')),
       (2,'usuario', 'user@user.com.br', md5('123')),
       (3,'mega', 'mega@mega.com.br', md5('123'));

--  POPULANDO tabela `Pais`
INSERT INTO pais(idPais, nome)
VALUES(1,'Brasil'),
      (2,'Argentina'),
      (3,'Bolivia');

--  POPULANDO tabela `Estado`
INSERT INTO estado(idEstado, nome, UF,idPais)
VALUES(1,'Rio Grande do Sul','RS', 1),
      (2,'Santa Catarina','SC', 1);

--  POPULANDO tabela `Cidade`
INSERT INTO cidade(idCidade, nome, cep,idEstado)
VALUES(1,'Uruguaiana',99220221, 1),
      (2,'Blumenau',92820982, 2),
      (3,'Itaqui',09987621, 1),
      (4,'Sao Borja',97670000, 1),
      (5,'Santo Angelo',92860982, 1);


--  POPULANDO tabela `endereco`

INSERT INTO endereco(idEndereco,bairro,rua,numero,idCidade,idEstado,idPais,telefone)
VALUES(1,'Onedo Carvalho','mariquita',2312,1,1,1,55991514169),
      (2,'Vila Isabel','Maria Candida',4212,2,2,1,55991514439),
      (3,'Jardim da paz','aparicio mariense',9928,3,1,1,55921514469),
      (4,'centro','barao do rio branco',8273,4,1,1,55991514269),
      (5,'andradas','eusébio martins',0192,5,1,1,55991514462);

--  POPULANDO tabela `produto`
INSERT INTO produto(idProduto,nome,descricao,marca,quantidade,preco)
VALUES(1,'Ração Martin Dog','Ração para cachorros','Matin Dog','3kg',23.12),
      (2,'Ração Martin Dog','Ração para cachorros','Matin Dog','5kg',33.17),
      (3,'Ração Whiskas','Ração para gatos','Whiskas','3kg',13.19),
      (4,'Ração Whiskas','Ração para gatos','Whiskas','5kg',22.15),
      (5,'Ração MegaZOO','Ração para aves','MegaZOO','3kg',45.22);